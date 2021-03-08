<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WorkmotionCreativeTest extends Controller
{

    /**
     * @param Request $request
     */
    public function search(Request $request)
    {
        $search = $request->input;
        $response = Http::get('https://maps.googleapis.com/maps/api/place/findplacefromtext/json', [
            'input' => $search,
            'inputtype' => 'textquery',
            'fields' => 'formatted_address,name,opening_hours',
            'key' => env('GOOGLE_API_KEY'),
        ]);
        return $response->json();
    }
}
