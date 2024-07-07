<?php

namespace Modules\Message\Broadcasting;

use Modules\User\Model\User;
use Illuminate\Support\Facades\Auth;

class JoinChat
{
    /**
     * Create a new channel instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     */
    public function join(User $user)
    {
        if ($user->id === Auth::id()) {
            return ['id' => $user->id, 'name' => $user->name];
        }
        return true;
    }
}
