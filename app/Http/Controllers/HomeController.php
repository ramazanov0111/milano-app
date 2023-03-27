<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function home(): Renderable
    {
        return view('pages.main');
    }

    /**
     * Show the application dashboard.
     *
     * @return array
     */
    public function getCategories(): array
    {
        return Category::query()
            ->where('parent_id', 0)
            ->where('published', 1)
            ->get()
            ->all();
    }
}
