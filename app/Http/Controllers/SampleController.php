<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleNotification;
use Auth;
use App\User;
class SampleController extends Controller
{
  public function SampleNotification()
  {
    $name = 'ララベル太郎';
    $text = 'これからもよろしくお願いいたします。';
    $user = Auth::user();
    $to = $user->email;
    Mail::to($to)->send(new SampleNotification($name, $text));
    return view('emails.success');
  }
}