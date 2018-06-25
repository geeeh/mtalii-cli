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
     * Return the path to public dir.
     *
     * @param null $path - destination
     *
     * @return string - full path
     */
    function publicPath($path=null)
    {
        return rtrim(app()->basePath('public/'.$path), '/');
    }
}
