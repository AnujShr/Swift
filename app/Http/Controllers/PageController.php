<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Support\Facades\Route;

class PageController extends Controller
{
    public function about()
    {
        $page = Page::query()->where('slug', 'about')->first();
        if (!$page) {
            abort(404);
        }
        $content = json_decode($page->content);
        return view('front.about.index', compact('page', 'content', 'activeRoutename'));
    }

    public function contact()
    {
        $page = Page::query()->where('slug', 'contact')->first();
        if (!$page) {
            abort(404);
        }
        $content = json_decode($page->content);
        return view('front.contact.index', compact('page', 'content', 'activeRoutename'));
    }

    public function feedback()
    {

    }
}
