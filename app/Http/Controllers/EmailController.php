<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['send']]);
    }

    public function send(Request $request)
    {
        

        $data['subject'] = 'test';
        $data['message'] = 'test';

        $email = new WelcomeEmail($data);
        Mail::to('thomasadam83@hotmail.com')->send($email);
        die('Welcome email sent successfully.');


        
    }

}