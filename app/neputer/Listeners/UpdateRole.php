<?php


namespace Neputer\Listeners;


use Illuminate\Auth\Events\Verified;

class UpdateRole
{

    /**
     * Verified Listener
     *
     * @param Verified $event
     */
    public function handle(Verified $event)
    {
        $event->user->assignRole(config('neputer.user_type.agent.key'));
    }

}

