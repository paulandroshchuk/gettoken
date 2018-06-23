<?php

namespace App\Http\Controllers\Gateways;

use App\Actions\Gateways\Contracts\CreateGateway;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gateways\CreateGatewayRequest;
use App\Models\Gateway;

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
     * Create a Gateway.
     *
     * @param CreateGatewayRequest $createGatewayRequest
     * @param CreateGateway $createGatewayAction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateGatewayRequest $createGatewayRequest, CreateGateway $createGatewayAction)
    {
        $createGatewayAction->handle($createGatewayRequest->user(), $createGatewayRequest->validated());

        session()->flash('success', 'The gateway has been created.');

        return redirect(route('gateways.index'));
    }

    /**
     * Delete the Gateway.
     *
     * @param Gateway $gateway
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Gateway $gateway)
    {
        $this->authorize('delete', $gateway);

        $gateway->delete();

        session()->flash('success', ' The gateway has been deleted.');

        return redirect()
            ->back();
    }
}
