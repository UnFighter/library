<?php

namespace App\Http\Controllers\Book;

use App\Services\Book\Service;

class BaseController
{
    public Service $service;

    public function __construct(Service $service){
        $this->service = $service;
    }
}
