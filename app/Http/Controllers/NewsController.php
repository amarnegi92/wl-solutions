<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * 
     */
    function admin_news()
    {
        $news = DB::table('news')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.news', ['news' => $news]);
    }
    /**
     * 
     */
    function users_news()
    {
        $news = DB::table('news')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('news', ['news' => $news]);
    }

    /** 
     * 
    */
    function post_add()
    {
    }

    /**
     * 
     */
    function get_edit()
    {
    }

    /** 
     * 
    */
    function post_edit()
    {
    }

    /**
     * 
     */
    function get_delete()
    {
    }
}
