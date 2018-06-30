<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Token;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
        $tokensCreated = Token::query()
            ->whereHas('gateway', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->where('created_at', '>=', now()->subDays(5))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as value')
            ]);

        $chartjs = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($tokensCreated->pluck('date')->toArray())
            ->datasets([
                [
                    "label" => "Tokens Sent",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $tokensCreated->pluck('value')->toArray(),
                ]
            ])
            ->options([]);

        return view('dashboard.index', [
            'chartjs' => $chartjs,
        ]);
    }
}
