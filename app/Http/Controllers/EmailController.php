<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Validator;

use App\Models\Email;

use App\Mail\Bio2024;

class EmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['send']]);
    }

    public function send(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([$validator->messages()]);
        }

        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');

        $email = new Bio2024($data);
        $result = Mail::to('a.t@brevisrefero.com')->send($email);

        $messageId = $result->getSymfonySentMessage()->getMessageId();

        $email = new Email();
        $email->to = 'a.t@brevisrefero.com';
        $email->from = getenv('MAIL_FROM_ADDRESS');
        $email->subject = 'BrickMMO at BIO 2024';
        $email->sendgrid_id = $messageId;
        $email->save();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Email has been sent successfully',
        ]);

    }

}