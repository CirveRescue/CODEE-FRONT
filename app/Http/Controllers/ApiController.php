<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://127.0.0.1:8000/',
        ]);
    }

    public function getData()
    {
        try {
            // Realiza una petición GET a la API
            $response = $this->client->request('GET', 'start-camera/'); // Asegúrate de que este endpoint esté definido
            $data = json_decode($response->getBody()->getContents(), true);
            return view('welcome');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

