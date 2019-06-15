<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\User,App\Setting;
use Auth;
class FooterComposer{


    public function __construct(){

    }

    public function compose(View $view)
    {
         $data = Setting::find(1);

        $view ->with('site_url',$data->site_url)
              ->with('site_logo',$data->site_logo)
              ->with('site_email',$data->site_email)
              ->with('copyrights',$data->copyrights)
              ->with('facebook',$data->facebook)
              ->with('twitter',$data->twitter)
              ->with('linkedin',$data->linkedin)

        ;
    }
}
