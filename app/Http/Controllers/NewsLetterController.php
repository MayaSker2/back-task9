<?php

namespace App\Http\Controllers;
use App\jobs\SendEmailNotification;

use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function send(Request $request){
        $user ['to'] = $request->to;
        $user ['name'] = $request->name;
        $user ['msg'] = $request->msg;

        SendEmailNotification::dispatch($user);

    }

}
