<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
   public function search (Request $request) {
        $search_string = Input::get ( 'search_string' );
        $course = Course::where ( 'title', 'LIKE', '%' .$search_string . '%' )->get ();
        if (count ( $course ) > 0)
            return view ( 'search_result' )->withDetails ( $course )->withQuery ( $search_string );
        else
            return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
    }
}
