<?php

namespace App\Http\Controllers\Book;

use App\Http\Requests\Book\StoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function store(StoreRequest $request): RedirectResponse
    {
        $data =  $request->validated();

        $this->service->store($data);

        return redirect()->route('book.index');
    }
}
