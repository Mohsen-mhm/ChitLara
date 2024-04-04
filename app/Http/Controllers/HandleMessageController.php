<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use App\Http\Requests\MessageSentRequest;
use App\Models\Chit;
use App\Models\MessageAttachment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HandleMessageController extends Controller
{
    public function sent(MessageSentRequest $request)
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
        $file = $request->file('file');
        $fileType = $request->input('fileType');

        $chit = $user->saveMessage->chits()->create([
            'uuid' => Str::uuid(),
            'user_id' => $user->id,
            'message' => $message
        ]);

        if ($file && $fileType) {
            if ($fileType == MessageAttachment::TYPE_FILE) {
                $path = 'files' . "/" . now()->year . "/" . now()->month . "/" . now()->day;
                $name = Str::password(30, true, true, false) . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs($path, $file, $name);
                $chit->attachment()->create([
                    'type' => MessageAttachment::TYPE_FILE,
                    'path' => $path,
                    'name' => $name
                ]);
            } elseif ($fileType == MessageAttachment::TYPE_IMAGE) {
                $path = 'images' . "/" . now()->year . "/" . now()->month . "/" . now()->day;
                $name = Str::password(30, true, true, false) . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs($path, $file, $name);
                $chit->attachment()->create([
                    'type' => MessageAttachment::TYPE_IMAGE,
                    'path' => $path,
                    'name' => $name
                ]);
            }
        }

        MessageSentEvent::dispatch($chit);

        return $this->response(true, 'Successfully saved & Broadcast', collect($chit)->toArray());
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
