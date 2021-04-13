<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Post;

class Posts extends Command
{

    protected $signature = 'posts:fetch';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = $response->json();

        foreach($posts as $post) {
            Post::create([
                'user_id'   => $post['userId'],
                'title'     => $post['title'],
                'body'      => $post['body'],
            ]);
        }
    }
}
