<?php

namespace App\Http\Service\Client;

use Exception;
use JsonException;

class CbrClient extends BaseClient
{
    protected const LINK = 'scripts/XML_daily.asp?date_req=';

    /**
     * @throws JsonException
     * @throws Exception
     */
    public function getCurrencyRate(): array
    {
        $response = $this->get(env('CBR_DOMAIN') . self::LINK . date('d/m/Y'));

        $xmlObject = simplexml_load_string($response);

        $json = json_encode($xmlObject, JSON_THROW_ON_ERROR);

        return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }
}