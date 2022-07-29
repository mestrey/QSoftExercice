<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class PagesController extends BaseController
{
    public function about()
    {
        return view('pages.informations.about');
    }

    public function client()
    {
        return view('pages.informations.client');
    }

    public function condition()
    {
        return view('pages.informations.condition');
    }

    public function contact()
    {
        return view('pages.informations.contact');
    }

    public function finance()
    {
        return view('pages.informations.finance');
    }
}
