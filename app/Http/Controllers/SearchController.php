<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    /**
     * Show the navbar search results.
     *
     * @param Request $request
     * @return View
     */
    public function showNavbarSearchResults(Request $request)
    { 
        if (! $request->filled('searchVal')) {
            return back();
        } 

        $keyword = $request->input('searchVal');
dd($keyword);
 
         
    }
}