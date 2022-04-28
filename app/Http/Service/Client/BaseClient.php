<?php

namespace App\Http\Service\Client;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class BaseClient
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @throws Exception
     */
    public function get(string $link): string
    {
        try {
            $response = $this->client->request('GET', $link);
            return $response->getBody()->getContents();
        } catch (GuzzleException) {
            throw new Exception("Запрос к $link не доступен.");
        }
    }
}