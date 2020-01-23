<?php

namespace VivifyIdeas\SlackApi\Methods;

use VivifyIdeas\SlackApi\Contracts\SlackView;

class View extends SlackMethod implements SlackView
{
    protected $methodsGroup = 'views.';

    /**
     *  Open a view for a user.
     */
    public function open(string $trigger_id, string $view)
    {
        return $this->method('open', compact('trigger_id', 'view'));
    }

    /**
     *  Publish a static view for a User.
     *  Options: hash
     */
    public function publish(string $user_id, string $view, array $options = [])
    {
        return $this->method('publish', array_merge($options, compact('user_id', 'view')));
    }

    /**
     *  Push a view onto the stack of a root view.
     */
    public function push(string $trigger_id, string $view)
    {
        return $this->method('push', compact('trigger_id', 'view'));
    }

    /**
     * Update an existing view.
     * Options: external_id, hash, view_id
     */
    public function update(string $view, array $options = [])
    {
        return $this->method('update', array_merge($options, compact('view')));
    }
}
