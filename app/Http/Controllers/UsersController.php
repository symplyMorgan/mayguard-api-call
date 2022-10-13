<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
{

    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'max:20'],
        ]);

        $url = 'https://apidev.mayguard.ai/api/v1/auth/login';
        $response = $this->guzzlePost($url, $data);

        dd($response);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'firstname' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email:dns', 'max:255'],
            'phone' => ['required', 'string'],
            'password' => ['required', 'string', 'min:5', 'max:20'],
            'organisationName' => ['required', 'string'],
        ]);

        $url = 'https://apidev.mayguard.ai/api/v1/auth/register';
        $response = $this->guzzlePost($url, $data);

        dd($response);
    }

    protected function guzzlePost(string $url, array $data): \Illuminate\Support\Collection
    {
        $response = Http::post($url, $data);
        return $response->collect();
    }

}
