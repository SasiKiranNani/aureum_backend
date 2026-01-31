<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class NominationExport implements FromCollection, WithCustomStartCell, WithEvents, WithHeadings, WithMapping
{
    protected $nominations;

    protected $nominationFields;

    protected $paymentFields;

    protected $title;

    public function __construct(Collection $nominations, array $nominationFields, array $paymentFields, string $title)
    {
        $this->nominations = $nominations;
        $this->nominationFields = $nominationFields;
        $this->paymentFields = $paymentFields;
        $this->title = $title;
    }

    public function collection()
    {
        return $this->nominations;
    }

    public function startCell(): string
    {
        return 'A3';
    }

    public function headings(): array
    {
        $headings = [];

        foreach ($this->nominationFields as $field) {
            $headings[] = strtoupper(str_replace('_', ' ', $field));
        }

        foreach ($this->paymentFields as $field) {
            $headings[] = 'PAYMENT '.strtoupper(str_replace('_', ' ', $field));
        }

        return $headings;
    }

    public function map($nomination): array
    {
        $map = [];

        foreach ($this->nominationFields as $field) {
            $map[] = $nomination->{$field};
        }

        foreach ($this->paymentFields as $field) {
            $payment = $nomination->payments->first();
            $map[] = $payment ? $payment->{$field} : '';
        }

        return $map;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $lastColumn = $event->sheet->getHighestColumn();

                // Main Title - Row 1
                $sheet->setCellValue('A1', $this->title);
                $sheet->mergeCells("A1:{$lastColumn}1");
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14)->setColor(new Color(Color::COLOR_WHITE));
                $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FF4F46E5');

                // Column Headings Styling - Row 3
                $sheet->getStyle("A3:{$lastColumn}3")->getFont()->setBold(true)->setColor(new Color(Color::COLOR_WHITE));
                $sheet->getStyle("A3:{$lastColumn}3")->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FF1E1B4B');
                $sheet->getStyle("A3:{$lastColumn}3")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // Auto-size columns
                foreach (range('A', $lastColumn) as $columnID) {
                    $sheet->getColumnDimension($columnID)->setAutoSize(true);
                }
            },
        ];
    }
}
