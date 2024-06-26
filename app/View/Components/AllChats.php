<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AllChats extends Component
{
    public User $user;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->user = User::query()->find(auth()->id());
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.all-chats');
    }
}
