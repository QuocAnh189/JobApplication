<?php

namespace Src\JobApplication\Presentation\HTTP\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Src\Common\Presentation\HTTP\Controllers\Controller;

class MyJobApplicationController extends Controller
{
    public function index()
    {
        return 'myjob.application';
    }

    public function destroy()
    {
        return 'myjob.application';
    }
}
