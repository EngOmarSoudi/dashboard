<?php

namespace App\Http\Controllers;

use App\Models\Agencies;
use App\Models\Photoable;
use Illuminate\Http\Request;

class AgenciesController extends Controller
{
    public function index()
    {
        return Agencies::with('photo')->orderBy('id', 'desc')->get();
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'url' => 'required|url',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg'
        ];

        $this->validate($request, $rules);

        $agency = Agencies::create($request->all());

        $filename = $request->image->getClientOriginalName();
        $fileextension =$request->image->getClientOriginalExtension();
        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

        if($request->image->move('images/', $file_to_store)) {
            Photoable::create([
                'filename' => $file_to_store,
                'photoable_id' => $agency->id,
                'photoable_type' => 'App\Models\Agencies',
            ]);
        }
    }


    public function show($id)
    {
        return Agencies::with('photo')->findOrFail($id);
    }


    public function update(Request $request,  $id)
    {
        $agency = Agencies::findOrFail($id);
        $rules = [
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'url' => 'required|url',
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
            if($request->image->move('images/', $file_to_store)) {
                $request['image'] = $file_to_store;
                Photoable::create([
                    'filename' => $file_to_store,
                    'photoable_id' => $agency->id,
                    'photoable_type' => 'App\Models\Agencies',
                ]);
            }
            if($agency->photo){
                $filename = $agency->photo->filename;
                unlink('images/'.$filename);
            }
            $agency->photo->delete();
            $agency->update($request->all());
        }else{
            $agency->update($request->all());
        }
    }


    public function destroy($id)
    {
        $agency = Agencies::findOrFail($id);
        if($agency->photo){
            $filename = $agency->photo->filename;
            unlink('images/'.$filename);
        }

        $agency->photo->delete();
        $agency->delete();

    }
}
