<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MakerController extends Controller
{
    public function createGroup(CreateGroupRequest $request): object
    {
        $user = User::query()->find(auth()->id());

        DB::beginTransaction();
        try {
            $group = Group::query()->create([
                'uuid' => Str::uuid(),
                'creator_id' => $user->id,
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'type' => $request->input('type'),
            ]);

            $user->groups()->attach($group->id);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->response(false, $exception->getMessage());
        }

        return $this->response(true, 'Created successfully');
    }
}
