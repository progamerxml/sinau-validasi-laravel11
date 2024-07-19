<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function create(): View
    {
        return view('post.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // validasi standar
        $dataValid = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'post' => 'require'
        ]);

        // validasi sebagai array
        $dataValid = $request->validate([
            'title' => ['required','unique:posts','max:255'],
            'post' => ['require'],
        ]);

        // validasi dengan method validateWithBag
        $dataValid = $request->validateWithBag('post', [
            'title' => 'required|unique:posts|max:255',
            'post' => 'require'
        ]);

        return redirect('/posts');
    }
}
