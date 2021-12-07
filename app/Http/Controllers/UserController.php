<?php

namespace App\Http\Controllers;

use App\Models\Photoable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::with('photo')->orderBy('id', 'desc')->get();
    }

    public function store(Request $request )
    {
        $rules = [
            'first_name' => 'required|string|min:3|max:30',
            'last_name' => 'required|string|min:3|max:30',
            'address' => 'required|string|max:30',
            'phone' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
        ];

        $this->validate($request, $rules);

        $user = User::create($request->merge(['password' => Hash::make($request['password'])])->all());

        $filename = $request->image->getClientOriginalName();
        $fileextension =$request->image->getClientOriginalExtension();
        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

        if($request->image->move('images/user/', $file_to_store)) {
            Photoable::create([
                'filename' => $file_to_store,
                'photoable_id' => $user->id,
                'photoable_type' => 'App\Models\User',
            ]);
        }



    }


    public function show($id)
    {
//        dd(User::with('photo')->findOrFail($id));
        return User::with('photo')->findOrFail($id);
    }


    public function update(Request $request,  $id)
    {
        $user = User::findOrFail($id);
        $rules = [
            'first_name' => 'required|string|min:3|max:30',
            'last_name' => 'required|string|min:3|max:30',
            'address' => 'required|string|max:30',
            'phone' => 'required|string',
            'email' => 'required|email'
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
            if($request->image->move('images/user/', $file_to_store)) {
                $request['image'] = $file_to_store;
                Photoable::create([
                    'filename' => $file_to_store,
                    'photoable_id' => $user->id,
                    'photoable_type' => 'App\Models\User',
                ]);
            }
            if($user->photo){
                $filename = $user->photo->filename;
                unlink('images/user/'.$filename);
            }
            $user->photo->delete();
            $user->update($request->all());
        }else{
            $user->update($request->all());
        }

    }


    public function destroy(User $user)
    {
//        if ($user->team_id ==0){
            if($user->photo){
                $filename = $user->photo->filename;
                unlink('images/user/'.$filename);
            }

            $user->photo->delete();
            $user->delete();
//        }else
//        {
//            echo 'sory';
//        }
    }
}
