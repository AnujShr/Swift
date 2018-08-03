<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function view($page)
    {
        $page = Page::query()->where('slug', $page)->first();
        $content = $page->content;
        $meta['title'] = $page->meta_title;
        $meta['description'] = $page->meta_description;
        $meta['keywords'] = $page->keywords;
        return view('admin.pages.templates.' . $page->slug, compact('page', 'content', 'meta'));
    }
}
