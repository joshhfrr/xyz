<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Todo;

class Todos extends Command
{

    protected $signature = 'todos:fetch';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/todos');
        $todos = $response->json();

        foreach($todos as $todo) {
            Todo::create([
                'user_id'   => $todo['userId'],
                'title'     => $todo['title'],
                'completed' => $todo['completed'],
            ]);
        }
    }
}
