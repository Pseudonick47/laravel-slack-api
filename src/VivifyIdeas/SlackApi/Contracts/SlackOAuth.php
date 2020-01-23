<?php

namespace VivifyIdeas\SlackApi\Contracts;

interface SlackOAuth
{
    /**
     * Exchanges a temporary OAuth verifier code for a workspace token.
     *
     * @param string $client_id
     * @param string $client_secret
     * @param string $code
     * @param array $options
     */
    public function token(string $client_id, string $client_secret, string $code, array $options = []);

    /**
     * Exchanges a temporary OAuth verifier code for an access token.
     *
     * @param string $code
     * @param array $options
     */
    public function access(string $code, array $options = []);
}
