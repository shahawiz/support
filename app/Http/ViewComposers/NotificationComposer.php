<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\User;
use Auth;
class NotificationComposer{


    public function __construct(){

    }

    public function compose(View $view)
    {
        $data = User::find(Auth::user()->id)->notifications->where('read_at','=',NULL);

        $view->with('unread_notifications',count($data));
    }
}
