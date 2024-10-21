<?php

namespace Src\JobApplication\Presentation\HTTP\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Src\Common\Presentation\HTTP\Controllers\Controller;

class JobApplicationController extends Controller
{
    public function create()
    {
        return 'job.application';
    }

    public function store()
    {
        return 'job.application';
    }
}
