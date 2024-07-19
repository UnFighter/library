<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    public function index(): Factory|View|Application
    {
        $books = Book::all();
        return view('book.index', compact('books'));
    }
    public function create(): Factory|View|Application
    {
        $authors = Author::all();
        return view('book.create', compact('authors'));
    }
    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'title' => 'string',
            'description'=>'string',
            'authors' => 'array',
        ]);
        $authors = $data['authors'];
        unset($data['authors']);

        $book = Book::query()->create($data);
        $book->authors()->attach($authors);

        return redirect()->route('book.index');
    }
    public function delete()
    {
        $book = Book::find(1);
        $book->delete();
    }
    public function destroy(Book $book): RedirectResponse
    {
        $book->authors()->detach();
        $book->delete();
        return redirect()->route('book.index');
    }
    public function update(Book $book): RedirectResponse
    {
        $data = request()->validate([
            'title' => 'string',
            'description'=>'string',
            'authors' => '',
        ]);
        $authors = $data['authors'];
        unset($data['authors']);

        $book->update($data);
        $book->authors()->sync($authors);
        return redirect()->route('book.index', $book->id);
    }
    public function show(Book $book): Factory|View|Application
    {
        $book->load('authors');
        return view('book.show', compact('book'));
    }
    public function edit(Book $book): Factory|View|Application
    {
        $authors = Author::all();
        return view('book.edit', compact('book', 'authors'));
    }
}
