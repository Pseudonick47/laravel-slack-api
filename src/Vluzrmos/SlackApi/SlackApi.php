<?php

namespace Vluzrmos\SlackApi;

use GuzzleHttp\Client;
use Illuminate\Support\Traits\Macroable;
use Vluzrmos\SlackApi\Contracts\SlackApi as Contract;

class SlackApi implements Contract
{
    use Macroable;

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * Token of the user of the Slack team (with administrator levels).
     *
     * @var string
     */
    private $token;

    /**
     * Url to slack.com, by default will use https://slack.com/api.
     *
     * @var String
     */
    private $url = 'https://slack.com/api';

    /**
     * @param Client|null $client
     * @param String|null $token
     */
    public function __construct(Client $client = null, $token = null)
    {
        $this->setClient($client);
        $this->setToken($token);
    }

    /**
     * @param string $method
     * @param string $url
     * @param array  $parameters
     *
     * @return mixed;
     */
    protected function method($method = 'get', $url = '', $parameters = [])
    {
		/** @var  \GuzzleHttp\Message\Response $response */
		$response = $this->getHttpClient()->$method($url, $parameters);

		/** @var  $contents */
		$contents = $response->json();

        return $contents;
    }

    /**
     * Send a GET Request.
     *
     * @param       $apiMethod
     * @param array $parameters
     *
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function get($apiMethod, $parameters = [])
    {
        $url = $this->getUrl($apiMethod);
        $parameters = $this->mergeParameters($parameters);

        return $this->method('get', $url, $parameters);
    }

    /**
     * Send a POST Request.
     *
     * @param       $apiMethod
     * @param array $parameters
     *
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function post($apiMethod, $parameters = [])
    {
        $url = $this->getUrl($apiMethod);
        $parameters = $this->mergeParameters($parameters);

        return $this->method('post', $url, $parameters);
    }

    /**
     * Send a PUT Request.
     *
     * @param       $apiMethod
     * @param array $parameters
     *
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function put($apiMethod, $parameters = [])
    {
        $url = $this->getUrl($apiMethod);
        $parameters = $this->mergeParameters($parameters);

        return $this->method('put', $url, $parameters);
    }

    /**
     * Send a DELETE Request.
     *
     * @param       $apiMethod
     * @param array $parameters
     *
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function delete($apiMethod, $parameters = [])
    {
        $url = $this->getUrl($apiMethod);
        $parameters = $this->mergeParameters($parameters);

        return $this->method('delete', $url, $parameters);
    }

    /**
     * Send a PATCH Request.
     *
     * @param       $apiMethod
     * @param array $parameters
     *
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function patch($apiMethod, $parameters = [])
    {
        $url = $this->getUrl($apiMethod);
        $parameters = $this->mergeParameters($parameters);

        return $this->method('patch', $url, $parameters);
    }

    /**
     * Generate the url with the api $method.
     *
     * @param null $method
     *
     * @return string
     */
    protected function getUrl($method = null)
    {
        return str_finish($this->url, '/').$method;
    }

    /**
     * Get the user token.
     *
     * @return null|string
     */
    protected function getToken()
    {
        return $this->token;
    }

    /**
     * Set the token of your slack team member (be sure is admin token).
     *
     * @param $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Configures the Guzzle Client.
     *
     * @param \GuzzleHttp\Client|Callback|null $client
     */
    public function setClient($client = null)
    {
        if (is_callable($client)) {
            $this->client = value($client);
        } elseif (is_null($client) and is_null($this->client)) {
            $this->client = new Client();
        } else {
            $this->client = $client;
        }

        $this->client->setDefaultOption('verify', false);
    }

    /**
     * Merge parameters of the request with token and timestamp string.
     *
     * @param $parameters
     *
     * @return array
     */
    protected function mergeParameters($parameters = [])
    {
        $options['query'] = [
            't' => time(),
            'token' => $this->getToken(),
        ];

        $options['body'] = $parameters;

        return $options;
    }

    /**
     * Get the Guzzle Client.
     *
     * @return Client
     */
    protected function getHttpClient()
    {
        return $this->client;
    }


}
