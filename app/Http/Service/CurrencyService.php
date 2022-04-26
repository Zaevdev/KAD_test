<?php

namespace App\Http\Service;

use App\Models\Currency;
use Illuminate\Support\Facades\DB;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Throwable;

class CurrencyService
{

    public function storeOrUpdate(): void
    {
        $xmlString = file_get_contents(('https://www.cbr.ru/scripts/XML_daily.asp?date_req=' . date('d/m/Y')));
        $xmlObject = simplexml_load_string($xmlString);

        try {
            $json = json_encode($xmlObject, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            abort(500);
        }

        try {
            $phpArray = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            abort(500);
        }

        $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
        $tr->setSource('ru'); // Translate from Russian

        foreach ($xmlObject->Valute as $arr) {
            try {
                Db::beginTransaction();
                Currency::updateOrCreate(['id_cbr' => $arr->attributes()->ID], [
                    'id_cbr' => $arr->attributes()->ID,
                    'name' => $arr->Name,
                    'english_name' => $tr->translate($arr->Name),
                    'alphabetic_code' => $arr->CharCode,
                    'digit_code' => $arr->NumCode,
                    'rate' => (float)str_replace(',', '.', $arr->Value),

                ]);
                Db::commit();
            } catch (Throwable $exception) {
                Db::rollBack();
                abort(500);
            }
        }
    }
}