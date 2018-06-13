<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * @var Guard
     */
    protected $guard;

    /**
     * DashboardController constructor.
     * @param Guard $guard
     */
    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Show either index or dashboard page.
     */
    public function index(): View
    {
        return view('dashboard.index', [
            'projects' => $this->guard->user()->getAttribute('projects'),
        ]);
    }
}
