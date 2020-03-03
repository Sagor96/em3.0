<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $data['contacts'] = \App\Models\Contact::select('id','contact_name', 'email', 'phone', 'address')->orderBy('id')->get();


        return view('contact.contact', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['clients'] = \App\Client::all();
        return view('contact.createContact', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //validate 
        $rules = [
                'contact_name'  => 'required',
                'email'         => 'required|email',
                'phone'         => 'required|numeric|regex:/(01)[0-9]{9}/',
                'address'       => 'required',
            ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        //insert to database
        \App\Models\Contact::create([
            'contact_name'          => $request->input('contact_name'),
            'email'                 => $request->input('email'),
            'phone'                 => $request->input('phone'),
            'address'               => $request->input('address'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Contact added Successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $data['contacts'] = \App\Models\Contact::select('id','contact_name','email', 'phone','address')->find($id);
        return view('contact.editContact', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate 
        $rules = [
                'contact_name'  => 'required',
                'email'         => 'required|email',
                'phone'         => 'required|numeric|regex:/(01)[0-9]{9}/',
                'address'       => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $request->merge([ 
        //     'service_id' => implode(',', (array) $request->get('service_id'))
        // ]);



        $contact = \App\Models\Contact::find($id);
      $contact->update([
          'contact_name'      => $request->input('contact_name'),
          'email'             => $request->input('email'),
          'phone'             => $request->input('phone'),
          'address'           => $request->input('address'),
      ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Contact Updated Successfully');

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = \App\Models\Contact::find($id);
        $contact->delete();

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Contact Deleted Successfully.');

        return redirect()->back();

    }
}
