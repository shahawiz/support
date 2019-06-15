<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\User,App\Setting;
use Auth;
class AdminSettingsComposer{


    public function __construct(){

    }

    public function compose(View $view)
    {
         $data = Setting::find(1);

        $view ->with('site_name',$data->site_name)
              ->with('site_url',$data->site_url)
              ->with('site_logo',$data->site_logo)
              ->with('site_email',$data->site_email)
              ->with('description',$data->site_desc)
              ->with('keywords',$data->keywords)
        ;
    }
}
