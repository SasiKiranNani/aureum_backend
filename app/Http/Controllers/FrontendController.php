<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
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
        return view('frontend.news-room');
    }

    public function newsRoomDetails()
    {
        return view('frontend.news-room-details');
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

    public function nomination()
    {
        $activeSeason = view()->shared('activeSeason');
        
        $categories = \App\Models\Category::where('is_active', true)->get();

        return view('frontend.nomination', compact('categories'));
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

    public function dashboard()
    {
        return view('frontend.dashboard');
    }

    public function whyEnter()
    {
        return view('frontend.why-enter');
    }
}
