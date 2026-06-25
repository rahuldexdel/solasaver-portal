<?php

namespace App\Http\Controllers;

use Modules\Cms\Models\Page;
use Illuminate\Http\Request;

class PublicPageController extends Controller
{


    public function whereToBuy()
    {
        $page = Page::with('sections.items')->where('slug', 'where-to-buy')->firstOrFail();
        return view('public.where-to-buy', compact('page'));   // your actual view path
    }




    public function findElectrician()
    {
        return view('public.find-electrician');
    }

    public function whyChooseUs()
    {
        $page = Page::with('sections.items')->where('slug', 'why-choose-us')->firstOrFail();
        return view('public.why-choose-us', compact('page'));
    }

    public function faq()
    {
        return view('public.faq');
    }

    public function home()
    {
        $page = Page::with('sections.items')->where('slug', 'home')->firstOrFail();
        return view('public.home', compact('page'));   // your existing home view path
    }


    
}