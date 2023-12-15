<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function about()
    {
        $keywords = ['PHP', 'Laravel', 'Blade', 'Eloquent', 'PostgreSQL', 'Breeze', 'Tailwind CSS'];

        return view('page.about', [
            'tags' => $keywords,
        ]);
    }
}
