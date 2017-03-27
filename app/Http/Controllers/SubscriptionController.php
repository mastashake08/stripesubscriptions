<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $token = \Stripe\Token::create(array(
          "card" => array(
            "number" => $request->card_number,
            "exp_month" => $request->card_month,
            "exp_year" => $request->card_year,

          )
        ));
        $customer = \Stripe\Customer::create([
          'source' => $token
        ]);
        $account = \App\Account::create([
          'name' => $request->name,
          'phone' => $request->phone,
          'email' => $request->email,
          'stripe_id' => $customer->id
        ]);

        \Stripe\Subscription::create(array(
          "customer" => $customer->id,
          "plan" => $request->plan
        ));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
