<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class AboutController
{
    public function index(): Factory|View|Application
    {
        return view('pages.about');
    }
}
