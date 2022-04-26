<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Stichoza\GoogleTranslate\GoogleTranslate;

class CurrencyController extends Controller
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        $currencies = Currency::all();

        return response()->json($currencies);
    }


    public function create(): void
    {
        //
    }


    public function store(): void
    {
        //
    }


    public function show($id): \Illuminate\Http\JsonResponse
    {
        $currency = Currency::find($id);

        return response()->json($currency);
    }


    public function edit(): void
    {
        //
    }


    public function update(): void
    {
        //
    }


    public function destroy(): void
    {
        //
    }
}