<?php

namespace App\Http\Controllers\Gateways;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gateways\CreateGatewayRequest;

class GatewaysController extends Controller
{
    /**
     * Show the integrations page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('gateways.index', [
            'gateways' => auth()->user()->gateways,
        ]);
    }

    /**
     * @param CreateGatewayRequest $createGatewayRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateGatewayRequest $createGatewayRequest)
    {
        $createGatewayRequest->user()->gateways()->create($createGatewayRequest->all());

        return redirect()->back();
    }
}
