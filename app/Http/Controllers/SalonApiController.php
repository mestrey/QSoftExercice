<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalonApiController extends Controller
{
    private array $salons = [
        [
            'name' => 'Салон на братиславской 1',
            'address' => 'Москва, ул. Братиславская, дом 23',
            'phone' => '+7 495 987 65 43',
            'start_time' => '09:00',
            'end_time' => '21:00',
            'image_href' => 'http://127.0.0.1:8000/pictures/test_salon_1.jpg',
        ],
        [
            'name' => 'Салон на братиславской 2',
            'address' => 'Москва, ул. Братиславская, дом 23',
            'phone' => '+7 495 987 65 43',
            'start_time' => '09:00',
            'end_time' => '21:00',
            'image_href' => 'http://127.0.0.1:8000/pictures/test_salon_2.jpg',
        ],
        [
            'name' => 'Салон на братиславской 3',
            'address' => 'Москва, ул. Братиславская, дом 23',
            'phone' => '+7 495 987 65 43',
            'start_time' => '09:00',
            'end_time' => '21:00',
            'image_href' => 'http://127.0.0.1:8000/pictures/test_salon_1.jpg',
        ],
        [
            'name' => 'Салон на братиславской 4',
            'address' => 'Москва, ул. Братиславская, дом 23',
            'phone' => '+7 495 987 65 43',
            'start_time' => '09:00',
            'end_time' => '21:00',
            'image_href' => 'http://127.0.0.1:8000/pictures/test_salon_1.jpg',
        ],
        [
            'name' => 'Салон на братиславской 5',
            'address' => 'Москва, ул. Братиславская, дом 23',
            'phone' => '+7 495 987 65 43',
            'start_time' => '09:00',
            'end_time' => '21:00',
            'image_href' => 'http://127.0.0.1:8000/pictures/test_salon_2.jpg',
        ],
    ];

    public function index(Request $request)
    {
        $inRandomOrder = $request->has('in_random_order');
        $limit = intval($request->query('limit'));
        $salons = $this->salons;

        if ($inRandomOrder) {
            shuffle($salons);
        }

        return response()->json(
            [
                'success' => true,
                'salons' => $limit > 0 ? array_slice($salons, 0, $limit) : $salons
            ],
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }
}
