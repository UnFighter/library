<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class MainController
{
    public function index(): Factory|View|Application
    {
        return view('main');
    }
}
