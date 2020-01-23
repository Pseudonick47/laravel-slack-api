<?php

namespace VivifyIdeas\SlackApi\Methods;

use VivifyIdeas\SlackApi\Contracts\SlackConversation;

class Conversation extends SlackMethod implements SlackConversation
{
    protected $methodsGroup = 'conversations.';

    /**
     *   Archives a conversation.
     */
    public function archive(string $channel)
    {
        return $this->method('archive', compact('channel'));
    }

    /**
     *   Closes a direct message or multi-person direct message.
     */
    public function close(string $channel)
    {
        return $this->method('close', compact('channel'));
    }

    /**
     *   Initiates a public or private channel-based conversation
     *   Options: is_private, user_ids
    */
    public function create(string $name, array $options = [])
    {
        return $this->method('create', array_merge($options, compact('name')));
    }

    /**
     *   Fetches a conversation's history of messages and events.
     *   Options: cursor, inclusive, latest, limit, oldest
    */
    public function history(string $channel, array $options = [])
    {
        return $this->method('history', array_merge($options, compact('channel')));
    }

    /**
     *   Retrieve information about a conversation.
     *   Options: include_locale, include_num_members
    */
    public function info(string $channel, array $options = [])
    {
        return $this->method('info', array_merge($options, compact('channel')));
    }

    /**
     *   Invites users to a channel.
     */
    public function invite(string $channel, array $userIds)
    {
        $users = join(',', $userIds);
        return $this->method('invite', compact('channel', 'users'));
    }

    /**
     *   Joins an existing conversation.
     */
    public function join(string $channel)
    {
        return $this->method('join', compact('channel'));
    }

    /**
     *   Removes a user from a conversation.
     */
    public function kick(string $channel, string $user)
    {
        return $this->method('kick', compact('channel', 'user'));
    }

    /**
     *   Leaves a conversation.
     */
    public function leave(string $channel)
    {
        return $this->method('leave', compact('channel'));
    }

    /**
     *   Lists all channels in a Slack team.
     *   Options: cursor, exclude_archived, limit, types
    */
    public function list(string $channel, array $options = [])
    {
        return $this->method('list', array_merge($options, compact('channel')));
    }

    /**
     *   Retrieve members of a conversation.
     *   Options: cursor, limit
    */
    public function members(string $channel, array $options = [])
    {
        return $this->method('members', array_merge($options, compact('channel')));
    }

    /**
     *   Opens or resumes a direct message or multi-person direct message.
     *   Options: return_im, users
    */
    public function open(string $channel, array $options = [])
    {
        return $this->method('open', array_merge($options, compact('channel')));
    }

    /**
     *   Renames a conversation.
     */
    public function rename(string $channel, string $name)
    {
        return $this->method('rename', compact('channel', 'name'));
    }

    /**
     *   Retrieve a thread of messages posted to a conversation
     *   Options: cursor, inclusive, latest, limit, oldest
    */
    public function replies(string $channel, string $ts, array $options = [])
    {
        return $this->method('replies', array_merge($options, compact('channel', 'ts')));
    }

    /**
     *   Sets the purpose for a conversation.
     */
    public function setPurpose(string $channel, string $purpose)
    {
        return $this->method('setPurpose', compact('channel', 'purpose'));
    }

    /**
     *   Sets the topic for a conversation.
     */
    public function setTopic(string $channel, string $topic)
    {
        return $this->method('setTopic', compact('channel', 'topic'));
    }

    /**
     *   Reverses conversation archival.
     */
    public function unarchive(string $channel)
    {
        return $this->method('unarchive', compact('channel'));
    }
}
