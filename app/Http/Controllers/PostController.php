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
        // $dataValid = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'post' => 'required'
        // ]);

        // validasi sebagai array
        // $dataValid = $request->validate([
        //     'title' => ['required','unique:posts','max:255'],
        //     'post' => ['required'],
        // ]);

        // validasi dengan method validateWithBag
        // $dataValid = $request->validateWithBag('post', [
        //     'title' => ['required','unique:posts','max:255'],
        //     'post' => ['required'],
        // ]);

        // menghentikan validasi pada kegagalan pertama
        // dd($request);
        $dataValid = $request->validate([
            'title' => 'bail|required|unique:posts|max:255',
            'post' => 'required',
            'author.name' => 'required',
            'author.email' => 'required',
            'v1\.0' => 'nullable',
        ]);

        // validasi pada kolom bersarang (nester field)
        // $dataValid = $request->validate([
        //     'title' => 'required|unique:posts|max:255', 
        //     'author.name' => 'required',
        //     'author.description' => 'required',
        // ]);

        // kolom dengan simbol periodik
        // $dataValid = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'v1\.0' => 'required',
        // ]);

        return redirect('/post/create');
    }
}
