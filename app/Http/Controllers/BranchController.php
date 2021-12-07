<?php

namespace App\Http\Controllers;

use App\Models\Branchs;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        return Branchs::get();
    }


    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|string|email',
            'telephone' => 'required|min:6',
            'phone' => 'required|min:9',
            'fax' => 'required|min:6',
            'main_address' => 'required',
            'branch_manager' => 'required',
            'lat' => 'required',
            'lng' => 'required',

        ];

        $this->validate($request, $rules);

        Branchs::create($request->all());

    }


    public function show($id)
    {
        return Branchs::findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $branch = Branchs::findOrFail($id);
        $rules = [
            'email' => 'required|string|email',
            'telephone' => 'required|min:6',
            'phone' => 'required|min:9',
            'fax' => 'required|min:6',
            'main_address' => 'required',
            'branch_manager' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ];

        $this->validate($request, $rules);
        $branch->update($request->all());
    }


    public function destroy($id)
    {
        $branch = Branchs::findOrFail($id);
        $branch->delete();
    }
}
