<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Support\Facades\Request;


class AdminPageController extends Controller
{
    /**
     * Detail page for manage page page
     */
    public function detail(){
        /*
         * another way to get data with child eloquent
        $page = Content::where('page', '=' , Content::ABOUT)->with([
                'createdBy' => function($query){
            return $query->with([
                        'profile'
                    ]);
                }
            ])->get();
        */


        $url = Request::segment(2);
        $page = Content::where('page', '=', $url)->with('createdBy.profile')->first();
        $contentCollection = collect([]);
        if($page){
            $content = json_decode($page->content);
            for($i=0;$i<count($content);$i++){
                $obj = $content[$i];
                $contentCollection ->push([
                    'order' => $obj->order,
                    'content' => $obj->content,
                    'image' => $obj->image,
                    'point1' => array_key_exists('point1',$obj) ? $obj->point1 : null,
                    'point2' => array_key_exists('point2',$obj) ? $obj->point2 : null,
                    'point3' => array_key_exists('point3',$obj) ? $obj->point3 : null,
                    'point4' => array_key_exists('point4',$obj) ? $obj->point4 : null,
                    'point5' => array_key_exists('point5',$obj) ? $obj->point5 : null,
                ]);
            }
        }
        return view('admin.page.detail',[
            'page' => $page,
            'content' => $contentCollection
        ]);
    }
}

