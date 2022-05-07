<?php

namespace App\Http\Service;

use App\Http\Service\Client\CbrClient;
use App\Models\Currency;
use JsonException;
use RuntimeException;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Throwable;

class CurrencyService
{
    private CbrClient $client;
    private GoogleTranslate $googleTranslate;

    public function __construct(CbrClient $client, GoogleTranslate $googleTranslate)
    {
        $this->client = $client;
        $this->googleTranslate = $googleTranslate;
    }

    /**
     * @throws JsonException
     */
    public function insertOrUpdate(): void
    {
        $currencies = $this->client->getCurrencyRate();

        $data = $this->getValutesForSave($currencies);

        try {
            (new Currency)->upsert(
                $data,
                ['id'],
                ['rate']
            );
        } catch (Throwable) {
            throw new RuntimeException("Не удалось добавить валюты в базу данных!");
        }
    }

    public function getValutesForSave(array $currencies): array
    {
        $data = [];
        $this->googleTranslate->setSource('ru');

        try {
            foreach ($currencies['Valute'] as $currency) {
                $data[] = [
                    'id' => $currency['@attributes']['ID'],
                    'name' => $currency['Name'],
                    'english_name' => $this->googleTranslate->translate($currency['Name']),
                    'alphabetic_code' => $currency['CharCode'],
                    'digit_code' => $currency['NumCode'],
                    'rate' => str_replace(',', '.', $currency['Value']) / $currency['Nominal']
                ];
            }

            return $data;
        } catch (Throwable) {
            throw new RuntimeException("Некорректные данные ключей массива при сохранении валют");
        }
    }
}