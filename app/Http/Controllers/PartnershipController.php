<?php

namespace App\Http\Controllers;

use App\Models\Partnership;
use App\Models\Photoable;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    public function index(){
        return Partnership::with('photo')->orderBy('id','desc')->get();
    }
    public function store(Request $request){
        $rules=[
          'name'=>'required|string',
          'name_ar'=>'required|string',
            'url'=>'required|url',
            'image'=>'required|mimes:jpeg,png,jpg,gif,svg'
        ];
        $this->validate($request,$rules);
        $partnership=Partnership::create($request->all());
        $filename = $request->image->getClientOriginalName();
        $fileextension =$request->image->getClientOriginalExtension();
        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

        if($request->image->move('images/', $file_to_store)) {
            Photoable::create([
                'filename' => $file_to_store,
                'photoable_id' => $partnership->id,
                'photoable_type' => 'App\Models\Partnership',
            ]);
        }
    }
    public function show($id)
    {
        return Partnership::with('photo')->findOrFail($id);
    }


    public function update(Request $request,  $id)
    {
        $partnership = Partnership::findOrFail($id);
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
                    'photoable_id' => $partnership->id,
                    'photoable_type' => 'App\Models\Partnership',
                ]);
            }
            if($partnership->photo){
                $filename = $partnership->photo->filename;
                unlink('images/'.$filename);
            }
            $partnership->photo->delete();
            $partnership->update($request->all());
        }else{
            $partnership->update($request->all());
        }
    }


    public function destroy($id)
    {
        $partnership = Partnership::findOrFail($id);
        if($partnership->photo){
            $filename = $partnership->photo->filename;
            unlink('images/'.$filename);
        }

        $partnership->photo->delete();
        $partnership->delete();

    }
}
