<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class LanguagesController extends Controller
{
    public function change($lang)
    {
        App::setLocale($lang);
        session()->put('locale', $lang);
        // dd(session()->get('locale'));
        return redirect()->back();
    }
}
