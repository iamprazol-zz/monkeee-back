<?php

namespace App\Http\Controllers;

use App\Notifications\NewSubscriber;
use Illuminate\Http\Request;
use App\Subscriber;
use Illuminate\Support\Facades\Notification;

class SubscriberController extends Controller
{

    public function store(Request $r){

      $email = $r->email;

      Subscriber::create([
          'email' => $email
      ]);

      Notification::route('mail', $email)->notify(new NewSubscriber($email));

      return response()->json([
          'message' => 'Successfully Subscribed'
      ],201);

    }

    public function index(){

        $subscriber = Subscriber::orderBy('id', 'asc')->get();

        $num = $subscriber->count();

        if($num > 0){

            return $this->responser($subscriber, 200, 'All the subscriber listed');

        } else {

            return $this->responser($subscriber, 404, 'No subscriber found');

        }

    }

}
