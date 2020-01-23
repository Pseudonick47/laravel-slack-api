<?php

namespace VivifyIdeas\SlackApi\Methods;

use VivifyIdeas\SlackApi\Contracts\SlackOAuth;

class OAuth extends SlackMethod implements SlackOAuth
{
    protected $methodsGroup = 'oauth.';

    /**
     * Exchanges a temporary OAuth verifier code for a workspace token.
     *
     * @param string $client_id - Issued when you created your application.
     * @param string $client_secret - Issued when you created your application.
     * @param string $code - The code param returned via the OAuth callback.
     * @param array $options ['redirect_uri' => 'https://...', single_channel => true/false]
     *
     * @return array
     */
    public function token(string $client_id, string $client_secret, string $code, array $options = [])
    {
        $requiredParams = compact('client_id', 'client_secret', 'code');
        return $this->method('token', array_merge($requiredParams, $options));
    }
    /**
     * 	Exchanges a temporary OAuth verifier code for an access token.
     * @param string $code
     * @param array  $options ['redirect_uri' => 'https://...', 'client_id' => '...', 'client_secret' => '...']
     *
     * @return array
     */
    public function access(string $code, array $options = [])
    {
        return $this->method('access', array_merge([
            'code' => $code,
        ], $options));
    }
}
