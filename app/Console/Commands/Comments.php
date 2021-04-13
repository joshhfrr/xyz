<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Comment;

class Comments extends Command
{

    protected $signature = 'comments:fetch';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/comments');
        $comments = $response->json();

        foreach($comments as $comment) {
            Comment::create([
                'post_id'   => $comment['postId'],
                'name'      => $comment['name'],
                'email'     => $comment['email'],
                'body'      => $comment['body'],
            ]);
        }
    }
}
