<?php

namespace App\Models;

class Salon
{
    public function __construct(
        public string $name,
        public string $address,
        public string $phone,
        public string $work_hours,
        public string $image,
    ) {
    }

    public static function createFromArray(array $data)
    {
        return new Salon(
            $data['name'] ?? 'Салон',
            $data['address'] ?? 'Москва',
            $data['phone'] ?? '+7 (000) 000 00 00',
            $data['work_hours'] ?? 'с 9:00 до 21.00',
            str_replace('assets', '', $data['image']) ?? '/pictures/test_salon_1.jpg',
        );
    }
}
