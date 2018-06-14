<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;

class BillingController extends Controller
{
    /**
     * Show the billing page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('billing.index');
    }
}
