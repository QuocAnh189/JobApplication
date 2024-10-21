<?php

namespace Src\Auth\Presentation\HTTP\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Src\Common\Presentation\HTTP\Controllers\Controller;

class AuthController extends Controller
{
    public function create()
    {
        return 'auth';
    }

    public function store(Request $request)
    {
        return 'auth';
    }

    public function destroy()
    {
        return 'auth';
    }
}
