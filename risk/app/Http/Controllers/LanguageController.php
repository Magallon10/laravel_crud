<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function __invoke(Request $request, $locale)
    {
        $available_locales = config("lang");
        if (array_key_exists( $locale, $available_locales )) {
            session()->put( 'locale', $locale);
            info( "02_ Controlador puesta variable de sesione $locale");
        }
        info("03 fin Controlador sesiones ", session()->all());
        return redirect()->back();
    }


    public function index($locale){
        session()->put('locale', $locale);
        logger("idioma ".$locale);
        return redirect()->back();
    }



}
