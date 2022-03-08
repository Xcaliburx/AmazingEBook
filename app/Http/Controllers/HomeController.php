<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function home()
    {
        $books = Ebook::paginate(15);
        return view('home', compact("books"));
    }

    public function detail($id)
    {
        $book = Ebook::where('ebook_id', $id)->first();
        return view('detail', compact("book"));
    }

    public function logout(){
        return view('logout');
    }
}
