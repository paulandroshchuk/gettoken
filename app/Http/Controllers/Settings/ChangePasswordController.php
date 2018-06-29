<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;

class ChangePasswordController extends Controller
{
    /**
     * Change User's password.
     *
     * @param ChangePasswordRequest $request
     * @return mixed
     */
    public function __invoke(ChangePasswordRequest $request)
    {
        $request->user()->changePassword($request->get('password'));

        return redirect()
            ->back()
            ->withSuccess('The password has been successfully changed.');
    }
}
