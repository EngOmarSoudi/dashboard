<?php

namespace App\Http\Controllers;

use App\Models\Photoable;
use App\Models\Product;
use App\Models\SubSection;
use App\Models\SubSectionSub;
use Illuminate\Http\Request;

class SubSectionsSubController extends Controller
{
    public function index()
    {
        return SubSectionSub::with('sections')->get();
    }

    public function store(Request $request)
    {
        $rules = [

            'title' => 'required',
            'title_ar' => 'required'
        ];

        $this->validate($request, $rules);

        $aboutus = SubSectionSub::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $con_inf = SubSectionSub::findOrFail($id);
        $rules = [

            'title' => 'required',
            'title_ar' => 'required'
        ];
        $this->validate($request, $rules);
        $con_inf->update($request->all());
    }

    public function destroy($id)
    {
        $category = SubSectionSub::findOrFail($id);
        $category->delete();
    }
}
