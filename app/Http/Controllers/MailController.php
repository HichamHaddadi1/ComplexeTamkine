<?php

namespace App\Http\Controllers;

use App\Http\Mail\SendMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail($id){
        $details = [
            'title' => 'دعوة للمشاركة في النسخة الثالثة من أيام المواكبة والتوجيه الافتراضية',
            'body' => ''
        ];

        $user = User::find($id);

        Mail::to($user->email)->cc('contact@tamkine.org')->send(new SendMail($details));
        return redirect()->back();
    }
}
