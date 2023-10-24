<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $keywords = ['PHP', 'Laravel', 'Blade', 'Eloquent', 'PostgreSQL', 'Breeze', 'Tailwind CSS'];
        return view('page.about', ['tags' => $keywords]);
    }
}
