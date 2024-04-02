<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use App\Http\Requests\MessageSentRequest;
use App\Models\Chit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HandleMessageController extends Controller
{
    public function sent(MessageSentRequest $request): void
    {
        $user = User::query()->find(auth()->id());
        switch (collect(session('active_box'))->get('type')) {
            case Chit::TYPE_SAVED:
                $this->sendToSaved($user, $request);
                break;
            case Chit::TYPE_GROUP:
                $this->sendToGroup($user, $request);
                break;
            case Chit::TYPE_USER:
                $this->sendToUser($user, $request);
                break;
        }
    }

    private function sendToSaved(User $user, Request $request)
    {
        $message = $request->input('message');

        $data = $user->saveMessage->chits()->create([
            'uuid' => Str::uuid(),
            'user_id' => $user->id,
            'message' => $message
        ]);
        MessageSentEvent::dispatch($data);

        return $this->response(true, 'Successfully saved & Broadcast', collect($data)->toArray());
    }

    private function sendToGroup(User $user, Request $request)
    {
        $message = $request->input('message');
    }

    private function sendToUser(User $user, Request $request)
    {
        $message = $request->input('message');
    }
}
