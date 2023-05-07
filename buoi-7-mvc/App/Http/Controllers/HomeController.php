<?php

namespace App\Http\Controllers;

use View\View;

class HomeController {

    public function index() 
    {
        $data = [
            'name' => 'duc',
            'job' => 'it'
        ];
        View::render('home/index.php', $data);
    }

}