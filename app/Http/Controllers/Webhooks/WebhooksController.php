<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;

class WebhooksController extends Controller
{
    /**
     * Show the webhooks page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('webhooks.index');
    }
}
