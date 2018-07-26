<?php

use App\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new App\Page)->truncate();
        $pages = [
            'Contact',
            'About',
            'Feedback',
        ];
        foreach ($pages as $pageTitle) {
            $a = [];
            Page::create([
                'title'   => $pageTitle,
                'slug' => str_slug($pageTitle),
                'content' => json_encode([])
            ]);
        }
    }
}
