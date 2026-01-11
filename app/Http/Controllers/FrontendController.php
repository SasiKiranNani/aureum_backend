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
}
