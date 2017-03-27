<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
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
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::all();
        $plans = \Stripe\Plan::all();
        $with = [
          'accounts' => $accounts,
          'plans' => $plans->data
        ];
        return view('home')->with($with);
    }
}
