<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Http;


class Users extends Command
{

    protected $signature = 'users:fetch';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        $users = $response->json();

        foreach($users as $user) {
            
            $address_array = [
                'street'    => $user['address']['street'],
                'suite'     => $user['address']['suite'],
                'city'      => $user['address']['city'],
                'zipcode'   => $user['address']['zipcode'],
                'geo'       => [
                                'lat' => $user['address']['geo']['lat'],
                                'lng' => $user['address']['geo']['lng'],
                            ],

            ];
            $company_array = [
                'name'          => $user['company']['name'],
                'catchPhrase'   => $user['company']['catchPhrase'],
                'bs'            => $user['company']['bs'],
            ];

            $address_json = json_encode($address_array);
            $company_json = json_encode($company_array);

            User::create([
                'name'      => $user['name'],
                'username'  => $user['username'],
                'email'     => $user['email'],
                'address'   => $address_json,
                'phone'     => $user['phone'],
                'website'   => $user['website'],
                'company'   => $company_json,
            ]);
        }
    }
}
