<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Fire an Action.
     *
     * @param $class
     * @param $data
     * @return mixed
     */
    protected function act($class, $data)
    {
        return call_user_func_array([$class, 'fire'], $data);
    }
}
