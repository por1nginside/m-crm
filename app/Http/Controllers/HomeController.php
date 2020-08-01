<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function switcher($locale)
    {
        $lang = in_array($locale, config('additional.enable_locale')) ? $locale : 'en';
        Session::put('locale', $lang);

        return redirect()->back();
    }
}
