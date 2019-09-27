<?php

namespace App\Http\Controllers\SuperAdmin;

use App\travel;
use App\travel_transection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\new_transection;
use App\news;
use ImageUploadAndResizer;
use Image;

class NewsController extends Controller
{

    public function index(Request $request)
    {
        $travel = new news;

        $p_row = $travel->paginate(50);
        if($request->ajax()){
            return view('news.list_news_element')->with(compact('p_row'));
        }else{
            return view('news.list_news')->with(compact('p_row'));
        }
    }


    public function create()
    {
        return view('news.form');
    }


    public function store(Request $request)
    {
        $news = new news;
        $news->name_th = $request->input('name_th');
        $news->name_en = $request->input('name_en');
        $news->detail_th = $request->input('detail_th');
        $news->detail_en = $request->input('detail_en');
        $news->user_id = Auth::user()->id;
        $news->save();

        if(!empty($request->file('photo'))){
            $file = $request->file('photo');
            foreach ($file as $row){
                $uploader_top = new ImageUploadAndResizer($row, 'images/photo');
                //$uploader_top->width = 1920;
                //$uploader_top->height = 800;
                $fileNameToDatabase = $uploader_top->execute();

                $tran = new new_transection;
                $tran->news_id = $news->id;
                $tran->photo = $fileNameToDatabase;
                $tran->save();
            }
        }


        return redirect('/super_admin/list_news');
    }


    public function show($id)
    {
        $news = news::find($id);

        return view('news.view')->with(compact('news'));
    }


    public function edit($id)
    {
        $news = news::find($id);

        return view('news.edit')->with(compact('news'));
    }

    public function update(Request $request)
    {
        $news = news::find($request->input('id'));
        $news->name_th = $request->input('name_th');
        $news->name_en = $request->input('name_en');
        $news->detail_th = $request->input('detail_th');
        $news->detail_en = $request->input('detail_en');
        $news->user_id = Auth::user()->id;
        $news->save();
        //dd($travel);

        if(!empty($request->file('photo'))){
            $file = $request->file('photo');
            foreach ($file as $row){
                $uploader_top = new ImageUploadAndResizer($row, 'images/photo');
                //$uploader_top->width = 1920;
                //$uploader_top->height = 800;
                $fileNameToDatabase = $uploader_top->execute();

                $tran = new new_transection;
                $tran->news_id = $news->id;
                $tran->photo = $fileNameToDatabase;
                $tran->save();
            }
        }


        return redirect('/super_admin/list_news');
    }

    public function destroy(Request $request)
    {
        $new = news::find($request->input('id'));
        $new->delete();

        $tran =  new_transection::where('news_id',$new->id)->delete();

    }

    public function delete_photo(Request $request){
        $new = new_transection::find($request->input('id'));
        $new->delete();
    }
}
