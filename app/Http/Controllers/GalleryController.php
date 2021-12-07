<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return Gallery::orderBy('id', 'desc')->get();
    }


    public function store(Request $request)
    {
        $rules = [
            'title' => 'nullable|string|min:6',
            'title_ar' => 'nullable|string|min:3',
            'file' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm,jpeg,png,jpg,gif,svg'
        ];

        $this->validate($request, $rules);

        $filename = $request->file->getClientOriginalName();
        $fileextension =$request->file->getClientOriginalExtension();
        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;
        $request->file->move('images/', $file_to_store);
        Gallery::create([
            'title' => $request->title,
            'title_ar' => $request->title_ar,
            'file' => $file_to_store
        ]);


    }


    public function show($id)
    {
        return Gallery::findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $file = Gallery::findOrFail($id);
        $rules = [
            'title' => 'nullable|string|min:3',
            'title_ar' => 'nullable|string|min:3'
        ];

        $this->validate($request, $rules);

        if($request->hasFile('file')){
            $rules = [
                'file' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm,jpeg,png,jpg,gif,svg'
            ];
            $this->validate($request, $rules);

            $filename = $request->file->getClientOriginalName();
            $fileextension =$request->file->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;
            $request->file->move('images/', $file_to_store);
            $request['file'] = $file_to_store;
            $file->update([
                'title' => $request->title,
                'title_ar' => $request->title_ar,
                'file' => $file_to_store
            ]);
        }else{
            $file->update([
                'title' => $request->title,
                'title_ar' => $request->title_ar,
            ]);
        }

    }


    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

    }
}
