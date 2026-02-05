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
        $categories = Category::where('is_active', true)->get();

        return view('frontend.categories', compact('categories'));
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
        if (!auth()->check()) {
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

            if (!$nomination) {
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

        if (!$categoryId) {
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
        if (!$activeSeason) {
            // If no active season, get the nearest upcoming one
            $upcomingSeason = \App\Models\Season::whereDate('opening_date', '>', $now)
                ->orderBy('opening_date', 'asc')
                ->first();
        }

        return view('frontend.how-to-nominate', compact('activeSeason', 'upcomingSeason'));
    }

    public function judges(Request $request)
    {
        $judgesPage = $request->input('judges_page', 1);
        $panelPage = $request->input('panel_page', 1);
        $perPage = 12;

        // Fetch Dummy Judges
        $dummyJudges = \App\Models\DummyJudge::with('category')
            ->where('is_active', true)
            ->where('is_judge', true)
            ->get()
            ->map(function ($judge) {
                return (object) [
                    'name' => $judge->judge_name,
                    'designation' => $judge->designation,
                    'image' => $judge->image,
                    'has_details_page' => $judge->has_details_page,
                    // Description from rich editor (HTML)
                    'bio_html' => $judge->description,
                    'specialization' => $judge->category ? $judge->category->name : '',
                    'linkedin' => $judge->linkedin_url,
                ];
            });

        // Fetch Approved Judge Applications
        $applicationJudges = \App\Models\JudgeApplication::with('category')
            ->where('status', 'approved')
            ->get()
            ->map(function ($judge) {
                return (object) [
                    'name' => $judge->name,
                    'designation' => $judge->present_designation,
                    'image' => $judge->profile_pic,
                    'has_details_page' => $judge->has_details_page,
                    // Bio from normal content (Plain Text) -> convert to HTML
                    'bio_html' => nl2br(e($judge->bio)),
                    'specialization' => $judge->category ? $judge->category->name : '',
                    'linkedin' => $judge->linkedin,
                ];
            });

        // Merge Judges
        $allJudges = $dummyJudges->concat($applicationJudges);

        // Shuffle judges to randomize order on each page load
        $allJudges = $allJudges->shuffle();

        // Paginate Judges Manually
        $judges = new \Illuminate\Pagination\LengthAwarePaginator(
            $allJudges->forPage($judgesPage, $perPage),
            $allJudges->count(),
            $perPage,
            $judgesPage,
            ['path' => $request->url(), 'pageName' => 'judges_page']
        );

        // Fetch Panel Members
        $panelQuery = \App\Models\DummyJudge::with('category')
            ->where('is_active', true)
            ->where('is_panel_member', true);

        // Get panel members and map them for consistency
        $allPanelMembers = $panelQuery->get()
            ->map(function ($member) {
                return (object) [
                    'name' => $member->judge_name,
                    'display_designation' => $member->designation,
                    // Description from rich editor
                    'bio_html' => $member->description,
                    'image' => $member->image,
                    'has_details_page' => $member->has_details_page,
                    'specialization' => $member->category ? $member->category->name : '',
                    'linkedin' => $member->linkedin_url,
                ];
            });

        // Shuffle panel members to randomize order on each page load
        $allPanelMembers = $allPanelMembers->shuffle();

        // Paginate Panel Members
        $panelMembers = new \Illuminate\Pagination\LengthAwarePaginator(
            $allPanelMembers->forPage($panelPage, $perPage),
            $allPanelMembers->count(),
            $perPage,
            $panelPage,
            ['path' => $request->url(), 'pageName' => 'panel_page']
        );

        // Append other paginator's page param to links so they don't reset each other
        $judges->appends('panel_page', $request->panel_page);
        $panelMembers->appends('judges_page', $request->judges_page);

        return view('frontend.judges', compact('judges', 'panelMembers'));
    }

    public function judgeDetails($name)
    {
        $decodedName = urldecode($name);

        $judge = \App\Models\DummyJudge::with('category')
            ->where('judge_name', $decodedName)
            ->where('is_active', true)
            ->first();

        $isRichText = true;

        if (!$judge) {
            $judge = \App\Models\JudgeApplication::with('category')
                ->where('name', $decodedName)
                ->where('status', 'approved')
                ->first();
            $isRichText = false;
        }

        if (!$judge || !$judge->has_details_page) {
            abort(404);
        }

        // Standardize object for view
        $judgeData = (object) [
            'name' => $judge->judge_name ?? $judge->name,
            // Display the category name in place of designation as requested
            'title' => $judge->category ? $judge->category->name : ($judge->designation ?? $judge->present_designation),
            'bio' => $isRichText ? ($judge->description ?? '') : nl2br(e($judge->bio ?? '')),
            'image' => $judge->image ?? $judge->profile_pic,
            'linkedin' => $judge->linkedin_url ?? $judge->linkedin,
        ];

        return view('frontend.judge-details', compact('judgeData'));
    }

    public function panelDetails($name)
    {
        return $this->judgeDetails($name);
    }

    public function judgingCriteria()
    {
        return view('frontend.judging-criteria');
    }

    public function pastWinners(Request $request)
    {
        $search = $request->input('search');
        $year = $request->input('year');
        $seasonId = $request->input('season_id');
        $badgeId = $request->input('badge_id');
        $categoryId = $request->input('category_id');

        $query = Nomination::with(['season', 'award', 'category', 'badge'])
            ->where('status', 'awarded')
            ->whereNotNull('badge_id')
            ->whereHas('season', function ($q) {
                $q->whereDate('closing_date', '<', now());
            });

        if ($search) {
            $query->where('full_name', 'like', '%' . $search . '%');
        }

        if ($year) {
            $query->whereHas('season', function ($q) use ($year) {
                $q->whereYear('opening_date', $year);
            });
        }

        if ($seasonId) {
            $query->where('season_id', $seasonId);
        }

        if ($badgeId) {
            $query->where('badge_id', $badgeId);
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $nominations = $query->orderBy('season_id', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(12)
            ->withQueryString();

        // Filter Options
        $years = \App\Models\Season::whereDate('closing_date', '<', now())
            ->selectRaw('YEAR(opening_date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        $seasons = \App\Models\Season::whereDate('closing_date', '<', now())
            ->orderBy('opening_date', 'desc')
            ->get();

        $badges = \App\Models\Badge::where('is_active', true)->get();
        $categories = Category::where('is_active', true)->get();

        return view('frontend.past-winners', compact('nominations', 'years', 'seasons', 'badges', 'categories'));
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

        if (!$user_id) {
            return redirect()->route('login')->with('error', 'Please login to view details.');
        }

        $booking = EventBooking::with(['event'])
            ->where('user_id', $user_id)
            ->where('id', $id)
            ->first();

        if (!$booking) {
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
