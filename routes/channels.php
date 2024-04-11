<?php

use App\Models\Chit;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\DB;

Broadcast::channel('chits.{userUuid}', function (User $user, string $userUuid) {
    return $user->id === User::getByUuid($userUuid)->id;
});

Broadcast::channel('group.chits.{groupUuid}', function (User $user, string $groupUuid) {
    return DB::table('group_users')->where('user_id', $user->id)
        ->where('group_id', Group::getByUuid($groupUuid)->id)
        ->exists();
});
