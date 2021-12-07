<?php

namespace App\Http\Controllers;

use App\Models\Photoable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $rules = [
            'first_name' => 'required|string|min:3|max:30',
            'last_name' => 'required|string|min:3|max:30',
            'address' => 'required|string|max:30',
            'phone' => 'required|string'
        ];
        $this->validate($request, $rules);

        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $fileextension =$request->image->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;
            if($request->image->move('images/user/',$file_to_store)) {
                $request['image'] = $file_to_store;
                Photoable::create([
                    'filename' => $file_to_store,
                    'photoable_id' => $user->id,
                    'photoable_type' => 'App\Models\User',
                ]);
            }

            $user->photo->delete();
            return response()->json(
                $user->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'address' => $request->address,
                    'image' => $file_to_store,
                ])
                , 200);

        }else{
            return response()->json(
                $user->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'address' => $request->address
                ])
                , 200);
        }


    }

    public function changepassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'password' => 'required|confirmed|min:6'
        ];

        $this->validate($request, $rules);

        if(Hash::check($request['oldpassword'], $user->password)){
            $user->update([
                'password' => Hash::make($request['password'])
            ]);
        }

    }
}
