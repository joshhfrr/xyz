<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Photo;

class Photos extends Command
{

    protected $signature = 'photos:fetch';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/photos');
        $photos = $response->json();

        foreach($photos as $photo) {
            Photo::create([
                'album_id'      => $photo['albumId'],
                'title'         => $photo['title'],
                'url'           => $photo['url'],
                'thumbnail_url' => $photo['thumbnailUrl'],
            ]);
        }
    }
}
