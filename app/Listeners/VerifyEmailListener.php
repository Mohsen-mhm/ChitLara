<?php

namespace App\Listeners;

use App\Events\VerifyEmailEvent;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class VerifyEmailListener
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
    public function handle(VerifyEmailEvent $event): void
    {
        Mail::to($event->user->email)->send(
            new VerifyEmail(
                User::query()->find($event->user->id),
                $event->code,
            )
        );
    }
}
