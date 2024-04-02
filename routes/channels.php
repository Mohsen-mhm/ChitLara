<?php

use App\Models\Chit;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chits.{userUuid}', function (User $user, string $userUuid) {
    return $user->id === User::getByUuid($userUuid)->id;
});
