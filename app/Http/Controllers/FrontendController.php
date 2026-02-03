<?php

namespace App\Http\Controllers;

use App\Models\AdminFee;
use App\Models\BankAccount;
use App\Models\Category;
use App\Models\Collaborator;
use App\Models\Discount;
use App\Models\Event;
use App\Models\EventBooking;
use App\Models\Newsroom;
use App\Models\Nomination;
use App\Models\PaymentGateway;
use App\Models\Update;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $updates = Update::where('is_active', true)->get();
        $collaborators = Collaborator::where('is_active', true)->get();

        return view('frontend.index', compact('updates', 'collaborators'));
    }

    public function aboutUs()
    {
        return view('frontend.about-us');
    }

    public function categories()
    {
        return view('frontend.categories');
    }

    public function newsRoom()
    {
        $newsrooms = Newsroom::where('is_active', true)->orderBy('date', 'desc')->paginate(9);

        return view('frontend.news-room', compact('newsrooms'));
    }

    public function newsRoomDetails($id)
    {
        $newsroom = Newsroom::findOrFail($id);

        return view('frontend.news-room-details', compact('newsroom'));
    }

    public function events()
    {
        $events = Event::where('is_active', true)->orderBy('event_date', 'asc')->paginate(9);

        return view('frontend.events', compact('events'));
    }

    public function eventDetails($id)
    {
        $event = Event::findOrFail($id);
        $paymentGateways = PaymentGateway::where('is_active', true)->get();
        $bankAccounts = BankAccount::where('is_active', true)->get();

        return view('frontend.event-details', compact('event', 'paymentGateways', 'bankAccounts'));
    }

    public function blog()
    {
        $blogs = \App\Models\Blog::where('is_active', true)->orderBy('date', 'desc')->paginate(9);

        return view('frontend.blog', compact('blogs'));
    }

    public function blogDetails($id)
    {
        $blog = \App\Models\Blog::findOrFail($id);

        return view('frontend.blog-details', compact('blog'));
    }

    public function contactUs()
    {
        return view('frontend.contact-us');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }

    public function termsAndConditions()
    {
        return view('frontend.terms-and-conditions');
    }

    public function cookiePolicy()
    {
        return view('frontend.cookie-policy');
    }

    public function cancellationRefundPolicy()
    {
        return view('frontend.cancellation-refund-policy');
    }

    public function nomination(Request $request)
    {
        if (! auth()->check()) {
            return redirect()->route('home')->with('open_auth_modal', true);
        }

        $categories = Category::where('is_active', true)->with('awards')->get();
        $adminFee = AdminFee::where('is_active', true)->first();
        $discounts = Discount::where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('user_id')->orWhere('user_id', auth()->id());
            })->get();
        $paymentGateways = PaymentGateway::where('is_active', true)->get();
        $bankAccounts = BankAccount::where('is_active', true)->get();

        $nomination = null;
        $activeSeason = \App\Models\Season::where('opening_date', '<=', now())
            ->where('application_deadline_date', '>=', now())
            ->first();

        $isSeasonOpen = false;

        if ($request->has('app_id')) {
            $nomination = Nomination::with(['answers', 'evidence', 'award', 'season'])
                ->where('user_id', auth()->id())
                ->where('application_id', $request->app_id)
                ->where('payment_status', 'pending')
                ->first();

            if (! $nomination) {
                return redirect()->route('dashboard.nominations')->with('error', 'Nomination not found or already paid.');
            }

            // Check if the stored nomination's season is open
            if ($nomination->season) {
                $isSeasonOpen = now()->between(
                    $nomination->season->opening_date,
                    $nomination->season->application_deadline_date->endOfDay()
                );
            }
        } else {
            // Check if there's any active season for new nominations
            if ($activeSeason) {
                $isSeasonOpen = true;
            } else {
                return redirect()->route('home')->with('open_season_modal', true);
            }
        }

        return view('frontend.nomination', compact('categories', 'adminFee', 'discounts', 'paymentGateways', 'bankAccounts', 'nomination', 'isSeasonOpen'));
    }

    public function getCategoryDetails(Request $request)
    {
        $categoryId = $request->query('category_id');

        if (! $categoryId) {
            return response()->json(['error' => 'Category ID required'], 400);
        }

        $awards = \App\Models\Award::where('category_id', $categoryId)
            ->where('is_active', true)
            ->get(['id', 'name', 'amount']);

        $questions = \App\Models\NomineeQuestion::where('category_id', $categoryId)
            ->where('is_active', true)
            ->get(['id', 'question']);

        return response()->json([
            'awards' => $awards,
            'questions' => $questions,
        ]);
    }

    public function awardTrophy()
    {
        return view('frontend.award-trophy');
    }

    public function howToNominate()
    {
        $now = now();

        // Check for active season (today is between opening and closing)
        $activeSeason = \App\Models\Season::whereDate('opening_date', '<=', $now)
            ->whereDate('closing_date', '>=', $now)
            ->first();

        $upcomingSeason = null;
        if (! $activeSeason) {
            // If no active season, get the nearest upcoming one
            $upcomingSeason = \App\Models\Season::whereDate('opening_date', '>', $now)
                ->orderBy('opening_date', 'asc')
                ->first();
        }

        return view('frontend.how-to-nominate', compact('activeSeason', 'upcomingSeason'));
    }

    public function judges()
    {
        return view('frontend.judges');
    }

    public function judgeDetails()
    {
        return view('frontend.judge-details');
    }

    public function judgingCriteria()
    {
        return view('frontend.judging-criteria');
    }

    public function pastWinners()
    {
        return view('frontend.past-winners');
    }

    public function pastWinnerDetails()
    {
        return view('frontend.past-winner-details');
    }

    public function dashboardOverview()
    {
        $nominationCount = \App\Models\Nomination::where('user_id', auth()->id())->count();
        $bookingCount = \App\Models\EventBooking::where('user_id', auth()->id())->count();

        return view('frontend.dashboard.overview', compact('nominationCount', 'bookingCount'));
    }

    public function dashboardProfile()
    {
        return view('frontend.dashboard.profile');
    }

    public function dashboardPassword()
    {
        return view('frontend.dashboard.password');
    }

    public function dashboardNominations()
    {
        $nominations = \App\Models\Nomination::with(['category', 'award', 'season'])
            ->where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.dashboard.nominations', compact('nominations'));
    }

    public function viewNomination($application_id)
    {
        $nomination = Nomination::with(['category', 'award', 'answers.nomineeQuestion', 'evidence', 'payments'])
            ->where('user_id', auth()->id())
            ->where('application_id', $application_id)
            ->firstOrFail();

        return view('frontend.dashboard.nomination-view', compact('nomination'));
    }

    public function dashboardBookings()
    {
        $bookings = EventBooking::with(['event'])
            ->where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.dashboard.bookings', compact('bookings'));
    }

    public function viewBooking($id)
    {
        $user_id = auth()->id();

        if (! $user_id) {
            return redirect()->route('login')->with('error', 'Please login to view details.');
        }

        $booking = EventBooking::with(['event'])
            ->where('user_id', $user_id)
            ->where('id', $id)
            ->first();

        if (! $booking) {
            // Check if it exists at all to give a better error
            $exists = EventBooking::where('id', $id)->exists();
            if ($exists) {
                return redirect()->route('dashboard.bookings')->with('error', 'Access denied to this booking.');
            }
            abort(404, 'Booking not found');
        }

        return view('frontend.dashboard.booking-view', compact('booking'));
    }

    public function whyEnter()
    {
        return view('frontend.why-enter');
    }
}
