<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Support\Facades\File;
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
        $icon = Content::ICON;
        if(!$page || !$page->content){
            abort(404);
        }

        $getDataPage = null;
        if($page) $getDataPage = $this->getDataHomePage($page);

        return view('admin.page.detail',[
            'page' => $page,
            'icons' => $icon,
            'content' => $getDataPage['contentCollection'],
            'slider' => $getDataPage['sliderCollection'],
            'service' => $getDataPage['serviceCollection'],
            'whyus' => $getDataPage['whyUsCollection']
        ]);
    }

    /**
     * @param Request $request
     */
    public function store(Requests $request)
    {
        $contentSliderCollection = collect([]);
        $contentServiceCollection = collect([]);
        $contentWhyUsCollection = collect([]);
        $home = Content::where('page',Content::HOME)->first();
        $getDataHomePage = $this->getDataHomePage($home);
        $sliderHome = $getDataHomePage['sliderCollection'];

        if(!$home || !$home->content){
            abort(404);
        }

        $images = array();
        if($request->hasfile('sliderImage')) {
            foreach($request->file('sliderImage') as $image) {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $images[] = $name;
            }
        }

        for($i=0;$i<count($request->sliderTitle); $i++){
            if(isset($images[$i])){
                $file_path = public_path().'/images/'. ($sliderHome[$i]['image']); // app_path("public/test.txt");
                if(File::exists($file_path)) File::delete($file_path);
            }
            $contentSliderCollection->push([
                "title"=> $request->sliderTitle[$i],
                "subTitle"=> $request->sliderSubtitle[$i],
                "image"=> isset($images[$i]) ? $images[$i] : $sliderHome[$i]['image'] ,
                "setButton"=> "",
                "buttonLabel"=> "",
                "url"=> ""
            ]);
        }

        for($j=0;$j<count($request->serviceIcon); $j++){
            $contentServiceCollection->push([
                "icon"=> $request->serviceIcon[$j],
                "subTitle"=> $request->serviceSubtitle[$j],
                "description"=> $request->serviceDescription[$j],
            ]);
        }

        for($k=0;$k<count($request->whyusIcon); $k++){
            $contentWhyUsCollection->push([
                "icon"=> $request->whyusIcon[$k],
                "subTitle"=> $request->whyusSubtitle[$k],
                "description"=> $request->whyusDescription[$k],
            ]);
        }

        $data = [
            array(
                "type" => "slider",
                "content" => $contentSliderCollection
            ),
            array(
                "type"=> "service",
                "title"=> $request->serviceTitle,
                "order"=> 1,
                "content" => $contentServiceCollection
            ),
            array(
                "type"=> "whyus",
                "title"=> $request->whyusTitle,
                "order"=> 2,
                "content" => $contentWhyUsCollection
            ),
        ];

        $content = $home->update([
            'content' => $data
        ]);

        if($content){
            toastr()->success('Data Content Berhasil Disimpan');
        }
        return redirect('admin/page/home');
    }

    public function getDataHomePage($page){
        $contentCollection = collect([]);
        $sliderCollection = collect([]);
        $whyUsCollection = collect([]);
        $serviceCollection = collect([]);

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
        return [
            'contentCollection' => $contentCollection,
            'sliderCollection' => $sliderCollection,
            'whyUsCollection' => $whyUsCollection,
            'serviceCollection' => $serviceCollection
        ];
    }
}

