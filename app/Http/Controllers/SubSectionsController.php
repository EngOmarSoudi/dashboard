<?php

namespace App\Http\Controllers;

use App\Models\SubSection;
use Illuminate\Http\Request;

class SubSectionsController extends Controller
{
    public function index()
    {
        return SubSection::with('section')->get();
    }

    public function store(Request $request)
    {
        $rules = [
            'section_id'=> 'required',
            'title' => 'required',
            'title_ar' => 'required'
        ];

        $this->validate($request, $rules);

        $aboutus = SubSection::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $con_inf = SubSection::findOrFail($id);
        $rules = [
            'section_id'=> 'required',
            'title' => 'required',
            'title_ar' => 'required'
        ];
        $this->validate($request, $rules);
        $con_inf->update($request->all());
    }

    public function destroy($id)
    {
        $category = SubSection::findOrFail($id);
        $category->delete();
    }
}
