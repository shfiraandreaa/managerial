<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function getWeather(Request $request)
    {
        try {
            
            $data = [];
            $response = Http::get("api.openweathermap.org/data/2.5/weather?q=London&appid=f7aa56ceccca38227637a016a5abf9c6");

            if ($response->getStatusCode() === 200) {
                $data = json_decode($response->getBody()->getContents());
            }

            return response()->json($data);

        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
