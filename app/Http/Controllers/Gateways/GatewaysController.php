<?php

namespace App\Http\Controllers\Gateways;

use App\Http\Controllers\Controller;

class GatewaysController extends Controller
{
    /**
     * Show the integrations page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('gateways.index');
    }
}
