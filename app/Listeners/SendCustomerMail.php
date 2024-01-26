<?php

namespace App\Listeners;

use App\Events\CustomerRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCustomerMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CustomerRegistered  $event
     * @return void
     */
    public function handle(CustomerRegistered $event)
    {
        //
    }
}
