<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function getRandomUsers()
    {
        $response = Http::get('https://randomuser.me/api/', [
            'results' => 5
        ]);

        $users = $response->json()['results'];
        $names = array_map(function($user) {
            return $user['name']['first'] . ' ' . $user['name']['last'];
        }, $users);

        $allLetters = implode('', $names);
        $letterCounts = array_count_values(str_split(strtolower($allLetters)));
        arsort($letterCounts);

        $mostCommonLetter = array_key_first($letterCounts);

        return response()->json([
            'users' => $users,
            'most_common_letter' => $mostCommonLetter
        ]);
    }
}
