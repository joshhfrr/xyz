<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Album;

class Albums extends Command
{

    protected $signature = 'albums:fetch';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/albums');
        $albums = $response->json();

        foreach($albums as $album) {
            Album::create([
                'user_id'   => $album['userId'],
                'title'     => $album['title'],
            ]);
        }


    }
}
