<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryJudgeQuestion;
use App\Models\JudgeApplication;
use Illuminate\Http\Request;

class JudgeApplicationController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('home')->with('open_auth_modal', true);
        }

        $categories = Category::where('is_active', true)->get();

        return view('frontend.judge-application', compact('categories'));
    }

    public function getQuestions($categoryId)
    {
        $questions = CategoryJudgeQuestion::where('category_id', $categoryId)
            ->where('is_active', true)
            ->get();

        return response()->json($questions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'present_designation' => 'required|string|max:255',
            'years_of_experience' => 'required|numeric|min:0',
            'working_company_name' => 'required|string|max:255',
            'address' => 'required|string',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal' => 'required|string|max:20',
            'category_id' => 'required|exists:categories,id',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'documents.*' => 'nullable|file|mimes:jpeg,png,jpg,webp,pdf,docx|max:10240',
            'linkedin' => 'nullable|url',
        ]);

        $data = $request->except(['profile_pic', 'documents', 'answers', 'document_urls']);

        // Handle Profile Pic
        if ($request->hasFile('profile_pic')) {
            $data['profile_pic'] = $request->file('profile_pic')->store('judge_profiles', 'public');
        }

        // Handle Documents
        $documents = [];
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $documents[] = [
                    'file' => $file->store('judge_documents', 'public'),
                    'name' => $file->getClientOriginalName(),
                ];
            }
        }
        $data['documents'] = $documents;

        // Handle Document URLs
        $document_urls = [];
        if ($request->has('document_urls')) {
            foreach ($request->document_urls as $url) {
                if ($url) {
                    $document_urls[] = ['url' => $url];
                }
            }
        }
        $data['document_urls'] = $document_urls;

        // Create the application
        $application = JudgeApplication::create($data);

        // Handle Answers
        if ($request->has('answers')) {
            foreach ($request->answers as $questionId => $answer) {
                if ($answer) {
                    \App\Models\JudgeApplicationAnswer::create([
                        'judge_application_id' => $application->id,
                        'category_judge_question_id' => $questionId,
                        'answer' => $answer,
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Your application has been submitted successfully and is under review.');
    }
}
