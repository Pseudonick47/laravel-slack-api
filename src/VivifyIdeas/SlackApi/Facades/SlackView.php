<?php

namespace VivifyIdeas\SlackApi\Facades;

use Illuminate\Support\Facades\Facade;

class SlackView extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'slack.view';
    }
}
