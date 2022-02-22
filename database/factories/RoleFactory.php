<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $authority = ['ROLE_ADMIN','ROLE_CORPORATE'];
        $name = ['Admin','Corporate'];


        return [
            'authority' =>  $random = Arr::random($authority),
            'name' =>  $random = Arr::random($name),
        ];
    }
}
