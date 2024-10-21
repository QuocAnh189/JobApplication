<?php

namespace Src\Job\Presentation\HTTP\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Src\Common\Presentation\HTTP\Controllers\Controller;

class JobController extends Controller
{
    public function index()
    {
        return 'job';
    }

    public function show(Request $request)
    {
        return 'job';
    }
}
