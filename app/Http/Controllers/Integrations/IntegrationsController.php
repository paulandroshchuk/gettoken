<?php

namespace App\Http\Controllers\Integrations;

use App\Http\Controllers\Controller;

class IntegrationsController extends Controller
{
    /**
     * Show the integrations page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('integrations.index');
    }
}
