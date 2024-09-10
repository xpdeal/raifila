<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NfService
{

    public function request()
    {
        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://api.nf-api.io/api/v1/nf',
            $this->getNf()
        );
    }



    public function getNf(): array
    {
        return [];
    }



}
