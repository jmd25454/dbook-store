<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ViaCepController extends Controller
{
    public function __invoke()
    {

        $response = Http::withoutVerifying()->get("https://servicodados.ibge.gov.br/api/v1/localidades/estados");

        $estados = $response->json();

        return view('estados', compact('estados'));
    }
}
