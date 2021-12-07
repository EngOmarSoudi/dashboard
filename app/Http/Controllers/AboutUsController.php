<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Photoable;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        return AboutUS::with('photo')->orderBy('id', 'desc')->get();
    }


    public function store(Request $request)
    {
        $rules = [

            'title' => 'required|string|min:3',
            'content'=> 'required|string|min:3',
            'ar_title' => 'required|string|min:3',
            'ar_content'=> 'required|string|min:3',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',

        ];

        $this->validate($request, $rules);

        $aboutus = AboutUS::create($request->all());

        $filename = $request->image->getClientOriginalName();
        $fileextension =$request->image->getClientOriginalExtension();
        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

        if($request->image->move('images/about_us/', $file_to_store)) {
            Photoable::create([
                'filename' => $file_to_store,
                'photoable_id' => $aboutus->id,
                'photoable_type' => 'App\Models\AboutUS',
            ]);
        }
    }


    public function show($id)
    {
        return AboutUS::with('photo')->findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $aboutus = AboutUS::findOrFail($id);
        $rules = [
            'title' => 'required|string|min:3',
            'ar_title' => 'required|string|min:3',
            'content'=> 'required|string|min:3',
            'ar_content'=> 'required|string|min:3',
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
            if($request->image->move('images/about_us/', $file_to_store)) {
                $request['image'] = $file_to_store;
                Photoable::create([
                    'filename' => $file_to_store,
                    'photoable_id' => $aboutus->id,
                    'photoable_type' => 'App\Models\AboutUS',
                ]);
            }
            if($aboutus->photo){
                $filename = $aboutus->photo->filename;
                unlink('images/about_us/'.$filename);
            }
            $aboutus->photo->delete();
            $aboutus->update($request->all());
        }else{
            $aboutus->update($request->all());
        }


    }


    public function destroy($id)
    {
        $aboutus = AboutUS::findOrFail($id);
        if($aboutus->photo){
            $filename = $aboutus->photo->filename;
            unlink('images/about_us/'.$filename);
        }
        $aboutus->photo->delete();
        $aboutus->delete();

    }
}
