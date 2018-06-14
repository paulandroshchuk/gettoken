<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * Show the settings page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('settings.index');
    }
}
