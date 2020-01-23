<?php

namespace VivifyIdeas\SlackApi\Contracts;

interface SlackConversation
{

    /**
     *   Archives a conversation.
     */
    public function archive(string $channelId);

    /**
     *   Closes a direct message or multi-person direct message.
     */
    public function close(string $channelId);

    /**
     *   Initiates a public or private channel-based conversation
     *   Options: is_private, user_ids
     */
    public function create(string $name, array $options = []);

    /**
     *   Fetches a conversation's history of messages and events.
     *   Options: cursor, inclusive, latest, limit, oldest
     */
    public function history(string $channelId, array $options = []);

    /**
     *   Retrieve information about a conversation.
     *   Options: include_locale, include_num_members
     */
    public function info(string $channelId, array $options = []);

    /**
     *   Invites users to a channel.
     */
    public function invite(string $channelId, array $userIds);

    /**
     *   Joins an existing conversation.
     */
    public function join(string $channelId);

    /**
     *   Removes a user from a conversation.
     */
    public function kick(string $channelId, string $userId);

    /**
     *   Leaves a conversation.
     */
    public function leave(string $channelId);

    /**
     *   Lists all channels in a Slack team.
     *   Options: cursor, exclude_archived, limit, types
     */
    public function list(string $channelId, array $options = []);

    /**
     *   Retrieve members of a conversation.
     *   Options: cursor, limit
    */
    public function members(string $channelId, array $options = []);

    /**
     *   Opens or resumes a direct message or multi-person direct message.
     *   Options: return_im, users
     */
    public function open(string $channelId, array $options = []);

    /**
     *   Renames a conversation.
     */
    public function rename(string $channelId, string $name);

    /**
     *   Retrieve a thread of messages posted to a conversation
     *   Options: cursor, inclusive, latest, limit, oldest
     */
    public function replies(string $channelId, string $ts, array $options = []);

    /**
     *   Sets the purpose for a conversation.
     */
    public function setPurpose(string $channelId, string $purpose);

    /**
     *   Sets the topic for a conversation.
     */
    public function setTopic(string $channelId, string $topic);

    /**
     *   Reverses conversation archival.
     */
    public function unarchive(string $channelId);
}
