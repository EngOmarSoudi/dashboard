<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return Contact::get();
    }

    public function store(Request $request)
    {
        $rules = [
            'facebook_url' => 'url',
            'twitter_url' => 'url',
            'instagram_url' => 'url',
        ];

        $this->validate($request, $rules);

        $aboutus = Contact::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $con_inf = Contact::findOrFail($id);
        $rules = [
            'facebook_url' => 'url',
            'twitter_url' => 'url',
            'instagram_url' => 'url',
        ];

        $this->validate($request, $rules);
        $con_inf->update($request->all());
    }
}
