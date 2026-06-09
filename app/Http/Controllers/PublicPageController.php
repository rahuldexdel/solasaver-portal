<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicPageController extends Controller
{
    public function whereToBuy()
    {
        return view('public.where-to-buy');
    }

    public function findElectrician()
    {
        return view('public.find-electrician');
    }
}