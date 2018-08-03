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
        $content = json_decode($page->content, true);
        $meta['title'] = $page->meta_title;
        $meta['description'] = $page->meta_description;
        $meta['keywords'] = $page->keywords;
        return view('admin.pages.edit', compact('page', 'content', 'meta'));
    }

    public function update(Request $request, $page)
    {
        $content = [];
        $data = $request->all();
        $page = Page::query()->where('slug', $page)->first();
        $page->title = $data['title'];
        $content = array_except($data, ['title', 'meta_title', 'meta_description', 'meta_keywords', '_method', '_token']);
        $page->content = json_encode($content);
        $page->meta_title = $data['meta_title'];
        $page->meta_description = $data['meta_description'];
        $page->keywords = $data['meta_keywords'];
        $page->save();
        return back();
    }


}
