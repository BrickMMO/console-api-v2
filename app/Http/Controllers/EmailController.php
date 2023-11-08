<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class EmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['send']]);
    }

    public function send(Request $request)
    {

        die('here');

    }

}