<?php

namespace VivifyIdeas\SlackApi\Contracts;

interface SlackView
{

    /**
     *  Open a view for a user.
     */
    public function open(string $trigger_id, string $view);

    /**
     *  Publish a static view for a User.
     *  Options: hash
     */
    public function publish(string $user_id, string $view, array $options = []);

    /**
     *  Push a view onto the stack of a root view.
     */
    public function push(string $trigger_id, string $view);

    /**
     * Update an existing view.
     * Options: external_id, hash, view_id
     */
    public function update(string $view, array $options = []);
}
