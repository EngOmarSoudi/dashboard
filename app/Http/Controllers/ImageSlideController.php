<?php

namespace App\Http\Controllers;

use App\Models\ImageSlide;

use App\Models\Photoable;
use Illuminate\Http\Request;

class ImageSlideController extends Controller
{

//    public function index()
//    {
//        return ImageSlide::with('photo')->orderBy('id', 'desc')->get();
//    }
//
//    public function store(Request $request)
//    {
//        $rules = [
//
//            'title' => 'required|string|min:3',
//            'ar_title' => 'required|string|min:3',
//            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
//            'GI' => 'required|integer|in:0,1'
//        ];
//
//        $this->validate($request, $rules);
//
//        $imageslide = ImageSlide::create($request->all());
//
//        $filename = $request->image->getClientOriginalName();
//        $fileextension =$request->image->getClientOriginalExtension();
//        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;
//
//        if($request->image->move('images/imageslider/', $file_to_store)) {
//            Photoable::create([
//                'filename' => $file_to_store,
//                'photoable_id' => $imageslide->id,
//                'photoable_type' => 'App\Models\ImageSlider',
//            ]);
//        }
//    }
//    public function store(Request $request){
//        $rules=[
//            'title' => 'required|string|min:3',
//            'content'=> 'required|string|min:3',
//            'ar_title' => 'required|string|min:3',
//            'ar_content'=> 'required|string|min:3',
//            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
//        ];
//        $this->validate($request,$rules);
//
//        $imageslider= ImageSlide::create($request->all());
//        $filename = $request->image->getClientOriginalName();
//        $fileextension =$request->image->getClientOriginalExtension();
//        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;
////        $file = $request->file('image')->store('images/imageSlider','public');
//        if($request->image->move('images/imageslider/', $file_to_store)) {
//            Photoable::create([
////                'filename' => $file,
//                'filename' => $file_to_store,
//                'photoable_id' => $imageslider->id,
//                'photoable_type' => 'App\Models\ImageSlide',
//            ]);
//        }
//    }
//    public function show($id)
//        {
//            return ImageSlide::with('photo')->findOrFail($id);
//        }
//
//    public function destroy($id)
//    {
//        $imageslider= ImageSlide::findOrFail($id);
//        if($imageslider->photo){
//            $filename = $imageslider->photo->filename;
//            unlink('images/imageslider/'.$filename);
//        }
//        $imageslider->photo->delete();
//        $imageslider->delete();
//
//    }
//    public function isdisplay(Request $request, ImageSlide $imageslide)
//    {
//        $imageslideIsDisplay = $imageslide->IG  ;
//
//        if($imageslideIsDisplay == 0){
//            $imageslide->IG = 1;
//        }else{
//            $imageslide->IG = 0;
//        }
//
//        $imageslide->update([
//            'IG' => $request->IG
//        ]);
//
//    }
//    public function update(Request $request,  $id)
//    {
////        dd($request->all());
//        $image = ImageSlide::findOrFail($id);
//        $rules = [
//            'title' => 'required|string|min:3',
//            'ar_title' => 'required|string|min:3',
//            'isdisplay' => 'integer|in:0,1'
//        ];
//        $this->validate($request, $rules);
//        if($request->hasFile('image')){
//            $rules = [
//                'image' => 'mimes:jpeg,png,jpg,gif,svg',
//            ];
//            $this->validate($request,$rules);
//
////            $imageslider= ImageSlide::create($request->all());
////            $file = $request->file('image')->store('images/imageSlider','public');
////            Photoable::create([
////                'filename' => $file,
////                'photoable_id' => $imageslider->id,
////                'photoable_type' => 'App\Models\ImageSlide',
////            ]);
//            $this->validate($request, $rules);
//            $filename = $request->image->getClientOriginalName();
//            $fileextension =$request->image->getClientOriginalExtension();
//            $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;
//            if($request->image->move('images/imageSlider/', $file_to_store)) {
//                $request['image'] = $file_to_store;
//                Photoable::create([
//                    'filename' => $file_to_store,
//                    'photoable_id' => $image->id,
//                    'photoable_type' => 'App\Models\ImageSlider',
//                ]);
//            }
//            if($image->photo){
//                $filename = $image->photo->filename;
//                unlink(
////                    $file
//                    'images/imageSlider/'.$filename
//                );
//            }
//            $image->photo->delete();
//            $contentValue = "";
//            if($request->content == null){
//                $contentValue = "";
//            }else{
//                $contentValue = $request->content;
//            }
//            $contentARValue = "";
//            if($request->ar_content == null){
//                $contentARValue = "";
//            }else{
//                $contentARValue = $request->ar_content;
//            }
//
//            $image->update([
//                'title' => $request->title,
//                'ar_title' => $request->ar_title,
//                'content' => $contentValue ,
//                'ar_content' => $contentARValue ,
//            ]);
//        }else{
//            $contentValue = "";
//            if($request->content == null){
//                $contentValue = "";
//            }else{
//                $contentValue = $request->content;
//            }
//            $contentARValue = "";
//            if($request->ar_content == null){
//                $contentARValue = "";
//            }else{
//                $contentARValue = $request->ar_content;
//            }
//            $image->update([
//                'title' => $request->title,
//                'ar_title' => $request->ar_title,
//                'content' => $contentValue ,
//                'ar_content' => $contentARValue ,
//            ]);
//        }
//
//
//    }
//    public function update(Request $request,  $id)
//    {
//        $image = ImageSlide::findOrFail($id);
//        $rules = [
//            'title' => 'required|string|min:3',
//            'ar_title' => 'required|string|min:3',
//            'GI' => 'integer|in:0,1'
//        ];
//        $this->validate($request, $rules);
//        if($request->hasFile('image')){
//            $rules = [
//                'image' => 'mimes:jpeg,png,jpg,gif,svg',
//            ];
//            $this->validate($request, $rules);
//            $filename = $request->image->getClientOriginalName();
//            $fileextension =$request->image->getClientOriginalExtension();
//            $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;
//            if($request->image->move('images/imageslider/', $file_to_store)) {
//                $request['image'] = $file_to_store;
//                Photoable::create([
//                    'filename' => $file_to_store,
//                    'photoable_id' => $image->id,
//                    'photoable_type' => 'App\Models\ImageSlider',
//                ]);
//            }
//            if($image->photo){
//                $filename = $image->photo->filename;
//                unlink('images/imageslider/'.$filename);
//            }
//            $image->photo->delete();
//            $contentValue = "";
//            if($request->content == null){
//                $contentValue = "";
//            }else{
//                $contentValue = $request->content;
//            }
//            $contentARValue = "";
//            if($request->ar_content == null){
//                $contentARValue = "";
//            }else{
//                $contentARValue = $request->ar_content;
//            }
//
//            $image->update([
//                'title' => $request->title,
//                'ar_title' => $request->ar_title,
//                'content' => $contentValue ,
//                'ar_content' => $contentARValue ,
//            ]);
//        }else{
//            $contentValue = "";
//            if($request->content == null){
//                $contentValue = "";
//            }else{
//                $contentValue = $request->content;
//            }
//            $contentARValue = "";
//            if($request->ar_content == null){
//                $contentARValue = "";
//            }else{
//                $contentARValue = $request->ar_content;
//            }
//            $image->update([
//                'title' => $request->title,
//                'ar_title' => $request->ar_title,
//                'content' => $contentValue ,
//                'ar_content' => $contentARValue ,
//            ]);
//        }
//
//
//    }
    public function index()
    {
        return ImageSlide::with('photo')->orderBy('id', 'desc')->get();
    }


    public function store(Request $request)
    {
        $rules = [

            'title' => 'required|string|min:3',
            'ar_title' => 'required|string|min:3',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'GI' => 'required|integer|in:0,1'
        ];

        $this->validate($request, $rules);

        $imageslide = ImageSlide::create($request->all());

        $filename = $request->image->getClientOriginalName();
        $fileextension =$request->image->getClientOriginalExtension();
        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

        if($request->image->move('images/imageslider/',$file_to_store)) {
            Photoable::create([
                'filename' => $file_to_store,
                'photoable_id' => $imageslide->id,
                'photoable_type' => 'App\Models\ImageSlide',
            ]);
        }
    }


    public function show($id)
    {
        return ImageSlide::with('photo')->findOrFail($id);
    }


    public function update(Request $request,  $id)
    {
        $image = ImageSlide::findOrFail($id);
        $rules = [
            'title' => 'required|string|min:3',
            'ar_title' => 'required|string|min:3',
            'GI' => 'integer|in:0,1'
        ];
        $this->validate($request, $rules);
        if($request->hasFile('image')){
            $rules = [
                'image' => 'mimes:jpeg,png,jpg,gif,svg',
            ];
            $this->validate($request, $rules);
            $filename = $request->image->getClientOriginalName();
            $fileextension =$request->image->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;
            if($request->image->move('images/imageslider/', $file_to_store)) {
                $request['image'] = $file_to_store;
                Photoable::create([
                    'filename' => $file_to_store,
                    'photoable_id' => $image->id,
                    'photoable_type' => 'App\Models\ImageSlide',
                ]);
            }
            if($image->photo){
                $filename = $image->photo->filename;
                unlink('images/imageslider/'.$filename);
            }
            $image->photo->delete();
            $contentValue = "";
            if($request->content == null){
                $contentValue = "";
            }else{
                $contentValue = $request->content;
            }
            $contentARValue = "";
            if($request->ar_content == null){
                $contentARValue = "";
            }else{
                $contentARValue = $request->ar_content;
            }

            $image->update([
                'title' => $request->title,
                'ar_title' => $request->ar_title,
                'content' => $contentValue ,
                'ar_content' => $contentARValue ,
            ]);
        }else{
            $contentValue = "";
            if($request->content == null){
                $contentValue = "";
            }else{
                $contentValue = $request->content;
            }
            $contentARValue = "";
            if($request->ar_content == null){
                $contentARValue = "";
            }else{
                $contentARValue = $request->ar_content;
            }
            $image->update([
                'title' => $request->title,
                'ar_title' => $request->ar_title,
                'content' => $contentValue ,
                'ar_content' => $contentARValue ,
            ]);
        }


    }


    public function destroy(ImageSlide $imageslide)
    {
        if($imageslide->photo){
            $filename = $imageslide->photo->filename;
            unlink('images/imageslider/'.$filename);
        }

        $imageslide->photo->delete();
        $imageslide->delete();

    }

    public function isdisplay(Request $request, ImageSlide $imageslide)
    {
        $imageslideIsDisplay = $imageslide->GI;

        if($imageslideIsDisplay == 0){
            $imageslide->GI = 1;
        }else{
            $imageslide->GI = 0;
        }

        $imageslide->update([
            'GI' => $request->GI
        ]);

    }
}
