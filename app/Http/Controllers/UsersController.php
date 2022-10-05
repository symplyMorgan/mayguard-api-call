<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'max:20'],
        ]);

        $url = 'https://apidev.mayguard.ai/api/v1/auth/login';
        $response = $this->attemptRequest($url, $data);

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
        $response = $this->attemptRequest($url, $data);

        dd($response);
    }

    protected function attemptRequest(string $url, array $data): bool|string
    {
        $curl = curl_init($url);
        $fields = http_build_query($data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

}
