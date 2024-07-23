<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Logout;
use Carbon\Carbon;

class UpdateLastLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }


    /**
     * Handle the event.
     */
    public function handle(Logout $event)
    {
        $user = $event->user;
        $user->last_login = Carbon::now('Africa/Libreville'); // Utilise le fuseau horaire du Gabon
        $user->save();
    }
}
