<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Photoable;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return News::with('photo')->orderBy('id', 'desc')->get();
    }
    public function store(Request $request)
    {

        $rules = [
            'title' => 'required|string|min:3',
            'leadingParagraph' => 'required|string',
            'title_ar' => 'required|string|min:3',
            'leadingParagraph_ar' => 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ];
        $this->validate($request, $rules);

        $new = News::create([
            'title' => $request->title,
            'leadingParagraph' => $request->leadingParagraph,
            'title_ar' => $request->title_ar,
            'leadingParagraph_ar' => $request->leadingParagraph_ar
        ]);

        $filename = $request->image->getClientOriginalName();
        $fileextension = $request->image->getClientOriginalExtension();
        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileextension;
        if ($request->image->move('images/news/', $file_to_store)) {
            Photoable::create([
                'filename' => $file_to_store,
                'photoable_id' => $new->id,
                'photoable_type' => 'App\Models\News',
            ]);
        }
    }
    public function show($id)
    {
        $new = News::with('photo')->findOrFail($id);
        return  $new;
    }
    public function update(Request $request, $id)
    {
        $new = News::findOrFail($id);
        $rules = [
            'title' => 'string|min:3',
            'leadingParagraph' => 'string',
            'title_ar' => 'string|min:3',
            'leadingParagraph_ar' => 'string'
        ];

        $this->validate($request, $rules);
        if ($request->hasFile('image')) {
            $rules = [
                'image' => 'mimes:jpeg,png,jpg,gif,svg',
            ];
            $this->validate($request, $rules);
            $filename = $request->image->getClientOriginalName();
            $fileextension = $request->image->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileextension;
            if ($request->image->move('images/news/', $file_to_store)) {
                $request['image'] = $file_to_store;
                Photoable::create([
                    'filename' => $file_to_store,
                    'photoable_id' => $new->id,
                    'photoable_type' => 'App\Models\News',
                ]);
            }
            if ($new->photo) {
                $filename = $new->photo->filename;
                unlink('images/news/' . $filename);
            }
            $new->photo->delete();
            $new->update($request->all());
        } else {
            $new->update($request->all());
        }
    }


    public function destroy($id)
    {
        $new = News::findOrFail($id);
        if ($new->photo) {
            $filename = $new->photo->filename;
            unlink('images/news/' . $filename);
        }
        $new->photo->delete();
        $new->delete();
    }
}
