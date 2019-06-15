<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //? Admin Panel Gate
        Gate::define('admin-dash',function ($user){
            return $user->user_role== 2 || $user->user_role==3;
        });

        //? Ticket View Gate
        Gate::define('ticket-view',function ($user,$ticketOwnerId){

            return $ticketOwnerId == $user->id || $user->user_role== 2 || $user->user_role==3;
        });
    }
}
