<?php

namespace VivifyIdeas\SlackApi\Methods;

use VivifyIdeas\SlackApi\Contracts\SlackUsersProfile;

class UsersProfile extends SlackMethod implements SlackUsersProfile
{
    protected $methodsGroup = 'users.profile';

    /**
     *  Retrieves a user's profile information.
     *  Options: include_label, user
     */
    public function get(array $options = [])
    {
        return $this->method('get', compact('options'));
    }

    /**
     *  Set the profile information for a user.
     *  Options: name, profile, user, value
     */
    public function set(array $options = [])
    {
        return $this->method('set', compact('options'));
    }
}
