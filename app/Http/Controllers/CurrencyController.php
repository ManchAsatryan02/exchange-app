<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Currency;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get list
        $list = Currency::get();

        // Return data
        return response()->json($list);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $slug_code, string $slug_date)
    {
        // Make url to send reqeust
        $urlTo = 'https://api.currencyapi.com/v3/historical?apikey=cur_live_KLEC39hPle3B4Sq0ZZxbdusBkOCrodEfi1dFVNVb&currencies=EUR%2CAMD%2CCAD%2CUSD%2CBMD%2CEUR&base_currency='.$slug_code.'&date='.$slug_date;

        // Check code slug
        if($slug_code == 'USD'){
            $urlTo = 'https://api.currencyapi.com/v3/historical?apikey=cur_live_KLEC39hPle3B4Sq0ZZxbdusBkOCrodEfi1dFVNVb&currencies=EUR%2CAMD%2CCAD%2CUSD%2CBMD%2CEUR&date='.$slug_date;
        }

        // Send request to API
        $response = Http::get($urlTo);
        
        // Data convert to Json
        $jsonData = $response->json();

        // Return data
        return response()->json($jsonData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug_code, string $slug_date)
    {
        // Make url to send reqeust
        $urlTo = 'https://api.currencyapi.com/v3/historical?apikey=cur_live_KLEC39hPle3B4Sq0ZZxbdusBkOCrodEfi1dFVNVb&currencies=EUR%2CAMD%2CCAD%2CUSD%2CBMD%2CEUR&base_currency='.$slug_code.'&date='.$slug_date;

        // Check code slug
        if($slug_code == 'USD'){
            $urlTo = 'https://api.currencyapi.com/v3/historical?apikey=cur_live_KLEC39hPle3B4Sq0ZZxbdusBkOCrodEfi1dFVNVb&currencies=EUR%2CAMD%2CCAD%2CUSD%2CBMD%2CEUR&date='.$slug_date;
        }

        // Send request to API
        $response = Http::get($urlTo);
        
        // Data convert to Json
        $jsonData = $response->json();

        // Return data
        return response()->json($jsonData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
