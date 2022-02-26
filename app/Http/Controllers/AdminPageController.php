<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as Requests;


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


        $url = Request::segment(3); //temporary use url segment
        $page = Content::where('page', '=', $url)->with('createdBy.profile')->first();
        $contentCollection = collect([]);
        $sliderCollection = collect([]);
        $whyUsCollection = collect([]);
        $serviceCollection = collect([]);

        if($page){
            $content = json_decode($page->content);
            for($i=0;$i<count($content);$i++){
                $obj = $content[$i];
                $contentCollection ->push([
                    'type' => $obj->type,
                    'content' => $obj->content,
                ]);

                $objContent = $obj->content;
                if ($obj->type == 'slider') {
                    for ($j = 0; $j < count($obj->content); $j++) {
                        $slider = $objContent[$j];
                        $sliderCollection->push([
                            "title" => $slider->title,
                            "subTitle" => $slider->subTitle,
                            "image" => $slider->image,
                            "setButton" => $slider->setButton,
                            "buttonLabel" => $slider->buttonLabel,
                            "url" => $slider->url
                        ]);
                    }
                }

                if ($obj->type == "service") {
                    $serviceCollection->push(["title" => $obj->title]);
                    for ($k = 0; $k < count($obj->content); $k++) {
                        $service = $objContent[$k];
                        $serviceCollection->push([
                            "subTitle" => $service->subTitle,
                            "description" => $service->description,
                            "icon" => $service->icon,
                        ]);
                    }
                }

                if($obj->type == "whyus") {
                    $whyUsCollection->push(["title" => $obj->title]);
                    for ($l = 0; $l < count($obj->content); $l++) {
                        $whyUs = $objContent[$l];
                        $whyUsCollection->push([
                            "subTitle" => $whyUs->subTitle,
                            "description" => $whyUs->description,
                            "icon" => $whyUs->icon,
                        ]);
                    }
                }

            }
        }

        return view('admin.page.detail',[
            'page' => $page,
            'content' => $contentCollection,
            'slider' => $sliderCollection,
            'service' => $serviceCollection,
            'whyus' => $whyUsCollection
        ]);
    }

    /**
     * @param Request $request
     */
    public function store(Requests $request)
    {
        dd($request);
    }
}

