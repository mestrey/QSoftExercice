<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class PagesController extends BaseController
{
    public function about()
    {
        return view('pages.about');
    }

    public function client()
    {
        return view('pages.client');
    }

    public function condition()
    {
        return view('pages.condition');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function finance()
    {
        return view('pages.finance');
    }
}
