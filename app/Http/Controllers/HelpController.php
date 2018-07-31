<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Helper;
class HelpController extends Controller {

    /**
     * Show the homepage
     * @return View
     */
    public function index() {
        //if we change soemthing here it should be changed in Questioncontroller index as well

        return view('help.index');
    }
    
    
    public function terms()
    {
        return view('help.terms');
    }

    public function privacy()
    {
        return view('help.privacy');
    }
}
