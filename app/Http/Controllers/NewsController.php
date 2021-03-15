<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
    function post_add(Request $request)
    {
        try {
            $rules = [
                'title' => 'required',
                'content' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return  back()->withErrors($validator)
                    ->withInput();
            }
            $news_info = array(
                'title' => $request->get('title'),
                'ar_title' => $request->get('ar_title'),
                'ku_title' => $request->get('ku_title'),
                'content' => $request->get('content'),
                'ar_content' => $request->get('ar_content'),
                'ku_content' => $request->get('ku_content'),
                'created_by' => Auth::id(),
                'lang' => 'en'
            );
            $news_id = $request->get('news_id') ? News::whereId($request->get('news_id'))->update($news_info)
                :  News::create($news_info);
        } catch (\Exception $ex) {
            Log::error('Error in Method ' . __METHOD__ . '. Error: ' . $ex->getMessage() . '\n');
        }
        return redirect('admin/news');
    }

    /**
     * 
     */
    function get_edit($id)
    {
        try {
            $news_data = News::whereId($id)->first();
            if (isset($news_data)) {
                $news_data = $news_data->toArray();
            }
        } catch (\Exception $ex) {
            Log::error('Error in Method ' . __METHOD__ . '. Error: ' . $ex->getMessage() . '\n');
        }
        return view('admin.add_news', array('news' => $news_data));
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
    function get_delete($id)
    {
        try {
            News::where('id', $id)->delete();
        } catch (\Exception $ex) {
            Log::error('Error in Customer->getDelete() ' . $ex->getMessage() . '\n');
        }
        return redirect('admin/news');
    }
}
