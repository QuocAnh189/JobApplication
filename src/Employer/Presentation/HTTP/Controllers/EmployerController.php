<?php

namespace Src\Employer\Presentation\HTTP\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Src\Common\Presentation\HTTP\Controllers\Controller;

class EmployerController extends Controller
{
    // public function  __construct()
    // {
    //     $this->authorizeResource(Employer::class);
    // }

    public function create()
    {
        return 'employer';
    }

    public function store(Request $request)
    {
        return 'employer';
    }
}
