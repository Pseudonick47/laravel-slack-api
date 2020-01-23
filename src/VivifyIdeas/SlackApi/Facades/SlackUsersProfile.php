<?php

namespace VivifyIdeas\SlackApi\Facades;

use Illuminate\Support\Facades\Facade;

class SlackUsersProfile extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'slack.users.profile';
    }
}
