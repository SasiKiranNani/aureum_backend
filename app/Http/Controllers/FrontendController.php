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
        return view('frontend.nomination');
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

    public function whyEnter()
    {
        return view('frontend.why-enter');
    }
}
