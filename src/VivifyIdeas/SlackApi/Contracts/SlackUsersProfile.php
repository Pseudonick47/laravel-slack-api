<?php

namespace VivifyIdeas\SlackApi\Contracts;

interface SlackUsersProfile
{

    /**
     *  Retrieves a user's profile information.
     *  Options: include_label, user
     */
    public function get(array $options = []);

    /**
     *  Set the profile information for a user.
     *  Options: name, profile, user, value
     */
    public function set(array $options);
}
