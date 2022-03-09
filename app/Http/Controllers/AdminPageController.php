<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as Requests;


class AdminPageController extends Controller
{
    /**
     * Detail page for manage page home
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


        $page = Content::where('page', '=', Content::HOME)->with('createdBy.profile')->first();
        $icon = Content::ICON;
        $url = '/admin/page/home/';
        if(!$page || !$page->content){
            abort(404);
        }
        if(Request::segment(3) == 'about'){
            $url = '/admin/page/about/';
        }
        $getDataPage = null;
        if($page) $getDataPage = $this->getDataJson($page);


        return view('admin.page.detail',[
            'page' => $page,
            'icons' => $icon,
            'url' => $url,
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
        $getDataHomePage = $this->getDataJson($home);
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
                $file_path = public_path().'/images/'. ($sliderHome[$i]['image']);
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

    /**
     * Detail page for manage Page About
     */
    public function detailAbout(){
        $page = Content::where('page', '=', Content::ABOUT)->with('createdBy.profile')->first();
        $icon = Content::ICON;
        $url = '/admin/page/home/';
        if(!$page || !$page->content){
            abort(404);
        }
        if(Request::segment(3) == 'about'){
            $url = '/admin/page/about/';
        }
        $getDataPage = null;
        if($page) $getDataPage = $this->getDataJson($page);

        return view('admin.page.detail',[
            'page' => $page,
            'icons' => $icon,
            'url' => $url,
            'abouts' => $getDataPage['aboutCollection'],
            'visis' => $getDataPage['visiCollection'],
            'facts' => $getDataPage['factsCollection']
        ]);
    }

    /**
     * @param Request $request
     */
    public function storeAbout(Requests $request)
    {
        $visisCollection = collect([]);
        $about = Content::where('page',Content::ABOUT)->first();
        $getDataAboutPage = $this->getDataJson($about);
        $aboutExist = $getDataAboutPage['aboutCollection'];
        $visisExist = $getDataAboutPage['visiCollection'];

        if(!$about || !$about->content){
            abort(404);
        }

        $aboutImage  = $this->uploadFile($request,'aboutImage', $aboutExist);
        $visiImage = $this->uploadFile($request,'visisImage', $visisExist);

        for($j=0;$j<count($request->visisIcon); $j++){
            $visisCollection->push([
                "icon"=> $request->visisIcon[$j],
                "subTitle"=> $request->visisSubtitle[$j],
                "description"=> $request->visisDescription[$j],
            ]);
        }

        $data = [
            array(
                "type" => Content::ABOUT,
                "title"=> $request->aboutTitle,
                "order" => 0,
                "subTitle"=> $request->aboutSubtitle,
                "image"=> $aboutImage,
                "content"=> $request->aboutContent
            ),
            array(
                "type"=> "visi",
                "title"=> $request->visisTitle,
                "order"=> 1,
                "image" => $visiImage,
                "content" => $visisCollection
            ),
            array(
                "type"=> "facts",
                "title"=> $request->factTitle,
                "order"=> 2,
                "content" => $request->factContent
            ),
        ];

        $content = $about->update([
            'content' => $data
        ]);

        if($content){
            toastr()->success('Data Content Berhasil Disimpan');
        }
        return redirect('admin/page/about');
    }

    public function getDataJson($page){
        $contentCollection = collect([]);
        $sliderCollection = collect([]);
        $whyUsCollection = collect([]);
        $serviceCollection = collect([]);
        $aboutCollection = collect([]);
        $visiCollection = collect([]);
        $factsCollection = collect([]);

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

            if ($obj->type == 'about') {
                $about = $content[$i];
                $aboutCollection->push([
                    "title" => $about->title,
                    "subTitle" => $about->subTitle,
                    "image" => $about->image,
                    "content" => $about->content,
                ]);
            }

            if ($obj->type == 'visi') {
                $visiCollection->push(["title" => $obj->title]);
                $visiCollection->push(["image" => $obj->image]);
                for ($v = 0; $v < count($obj->content); $v++) {
                    $visi = $objContent[$v];
                    $visiCollection->push([
                        "icon" => $visi->icon,
                        "subTitle" => $visi->subTitle,
                        "description" => $visi->description,
                    ]);
                }
            }

            if ($obj->type == 'facts') {
                $facts = $content[$i];
                $factsCollection->push([
                    "title" => $facts->title,
                    "content" => $facts->content,
                ]);
            }

        }

        return [
            'contentCollection' => $contentCollection,
            'sliderCollection' => $sliderCollection,
            'whyUsCollection' => $whyUsCollection,
            'serviceCollection' => $serviceCollection,
            'aboutCollection' => $aboutCollection,
            'visiCollection' => $visiCollection,
            'factsCollection' => $factsCollection
        ];
    }

    function uploadFile(Requests $request, $param, $existData){
        $imageName = null;
        $existingImage = isset($existData[0]['image']) ? $existData[0]['image']
            : $existData[1]['image'];
        if($request->hasfile($param)) {
            $file = $request->file($param);
            $name= now().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $imageName = $name;
        }

        if($request->hasfile($param)) {
            $file_path = public_path().'/images/'. ($existingImage);
            if(File::exists($file_path)) File::delete($file_path);
        }

        $imageName = isset($imageName) ? $imageName
            : $existingImage;

        return $imageName;
    }
}

