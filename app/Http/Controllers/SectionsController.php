<?php

namespace App\Http\Controllers;

use App\Models\Photoable;
use App\Models\Product;
use App\Models\Section;
use App\Models\SubSection;
use App\Models\SubSectionSub;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function index()
    {
        $sections = Section::with('photo', 'subsections','subsectionssub')->get();
        return response()->json($sections);
    }


    public function store(Request $request)
    {

        $rules = [
            'title' => 'required|string|min:3',
            'details' => 'required|string',
            'title_ar' => 'required|string|min:3',
            'details_ar' => 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ];
        $this->validate($request, $rules);

        $section = Section::create([
            'title' => $request->title,
            'details' => $request->details,
            'title_ar' => $request->title_ar,
            'details_ar' => $request->details_ar
        ]);

        $filename = $request->image->getClientOriginalName();
        $fileextension = $request->image->getClientOriginalExtension();
        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileextension;
        if ($request->image->move('images/', $file_to_store)) {
            Photoable::create([
                'filename' => $file_to_store,
                'photoable_id' => $section->id,
                'photoable_type' => 'App\Models\Section',
            ]);
        }
    }


    public function show($id)
    {
        $section = Section::with('photo', 'subsections','subsectionssub')->findOrFail($id);
        $subsections = [];
        $subsectionssub = [];
        foreach ($section->subsections as $value) {
            $subsections[] = [
                'id' => $value->id,
                'section_id' => $value->section_id,
                'title' => $value->title,
                'title_ar' => $value->title_ar,
                'products' => Product::with('photo')->where('sub_section_id', $value->id)->get(),
//                'SubsectionSub'=>SubSectionSub::all()
            ];

        }

        $subsections= SubSection::all();
        foreach ($subsections->subsectionssub as $value) {
            $subsectionssub[] = [
                'id' => $value->id,
                'section_id' => $value->sub_section_id,
                'title' => $value->title,
                'title_ar' => $value->title_ar,
//                'products' => Product::with('photo')->where('sub_section_id', $value->id)->get(),
//                'SubsectionSub'=>SubSectionSub::all()
            ];

        }
        return response()->json([
            'section' => $section,
            'subsections' => $subsections,
            'subsectionssub' => $subsectionssub
        ]);
    }



    public function update(Request $request, $id)
    {

        $section = Section::with('photo')->findOrFail($id);
        $rules = [
            'title' => 'string|min:6',
            'details' => 'string',
            'title_ar' => 'string|min:3',
            'details_ar' => 'string'
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
            if ($request->image->move('images/', $file_to_store)) {
                $request['image'] = $file_to_store;
                Photoable::create([
                    'filename' => $file_to_store,
                    'photoable_id' => $section->id,
                    'photoable_type' => 'App\Models\Section',
                ]);
            }
            if ($section->photo) {
                $filename = $section->photo->filename;
                unlink('images/' . $filename);
            }
            $section->photo->delete();
            $section->update([
                'title' => $request->title,
                'details' => $request->details,
                'title_ar' => $request->title_ar,
                'details_ar' => $request->details_ar
            ]);
        } else {
            $section->update([
                'title' => $request->title,
                'details' => $request->details,
                'title_ar' => $request->title_ar,
                'details_ar' => $request->details_ar
            ]);
        }
        return $section;
    }


    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        if ($section->photo) {
            $filename = $section->photo->filename;
            unlink('images/' . $filename);
        }
        $section->photo->delete();
        $section->delete();
    }
}
