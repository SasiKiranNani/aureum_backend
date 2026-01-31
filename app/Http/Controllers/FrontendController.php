<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Award;
use App\Models\Nomination;
use App\Models\AdminFee;
use App\Models\Discount;
use App\Models\PaymentGateway;
use App\Models\Season;
use Illuminate\Http\Request;

use App\Models\Newsroom;
use App\Models\Update;

class FrontendController extends Controller
{
    public function index()
    {
        $updates = Update::where('is_active', true)->get();
        return view('frontend.index', compact('updates'));
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

    public function shippingReturnPolicy()
    {
        return view('frontend.shipping-return-policy');
    }

    public function nomination(Request $request)
    {
        $categories = Category::where('is_active', true)->with('awards')->get();
        $adminFee = AdminFee::where('is_active', true)->first();
        $discounts = Discount::where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('user_id')->orWhere('user_id', auth()->id());
            })->get();
        $paymentGateways = PaymentGateway::where('is_active', true)->get();

        $nomination = null;
        if ($request->has('app_id')) {
            $nomination = Nomination::with(['answers', 'evidence', 'award'])
                ->where('user_id', auth()->id())
                ->where('application_id', $request->app_id)
                ->where('payment_status', 'pending')
                ->first();

            if (!$nomination) {
                return redirect()->route('dashboard.nominations')->with('error', 'Nomination not found or already paid.');
            }
        }

        return view('frontend.nomination', compact('categories', 'adminFee', 'discounts', 'paymentGateways', 'nomination'));
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
            'questions' => $questions
        ]);
    }

    public function awardTrophy()
    {
        return view('frontend.award-trophy');
    }

    public function howToNominate()
    {
        return view('frontend.how-to-nominate');
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
        return view('frontend.dashboard.overview', compact('nominationCount'));
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
        $nominations = \App\Models\Nomination::with(['category', 'award'])
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

    public function whyEnter()
    {
        return view('frontend.why-enter');
    }
}
