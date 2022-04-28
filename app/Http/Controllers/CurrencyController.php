<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\JsonResponse;

class CurrencyController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $currencies = Currency::all();

            return response()->json($currencies);
        } catch (\Throwable) {
            return response()->json(['message' => 'БД недоступна!'], 400);
        }
    }

    public function show($id): JsonResponse
    {
        try {
            if (!$currency = Currency::find($id)) {
                return response()->json(['message' => 'Запрашиваемая валюта не найдена!'], 404);
            }

            return response()->json($currency);
        } catch (\Throwable) {
            return response()->json(['message' => 'БД недоступна!'], 400);
        }
    }
}