<?php

namespace App\Http\Controllers\Api\Organizations;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrganizationResource;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class OrganizationsController extends Controller
{
    public function index()
    {
        return OrganizationResource::collection(Auth::user()->getAttribute('organizations'));
    }
}
