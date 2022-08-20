<?php

namespace App\Models;

class Salon
{
    public function __construct(
        public string $name,
        public string $address,
        public string $phone,
        public string $startTime,
        public string $endTime,
        public string $imageHref,
    ) {
    }

    public static function createFromArray(array $data)
    {
        return new Salon(
            $data['name'] ?? 'Салон',
            $data['address'] ?? 'Москва',
            $data['phone'] ?? '+7 (000) 000 00 00',
            $data['start_time'] ?? '09:00',
            $data['end_time'] ?? '21:00',
            $data['image_href'] ?? 'http://127.0.0.1:8000/pictures/test_salon_1.jpg',
        );
    }
}
