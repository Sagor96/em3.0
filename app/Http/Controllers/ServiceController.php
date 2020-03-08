<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;        
use Illuminate\Support\Facades\Validator;
use App\Models;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['services'] = \App\Models\Service::with('venue')->select('id','s_name', 'amount','s_status','venue_id')->orderBy('id')->get();
        return view('service.service', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['venues'] = \App\Models\Venue::all();
      
        return view('service.service', $data);
        
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
            's_name'            => 'required',
            'amount'            => 'required|numeric',
            's_status'          => 'required',
            'venue_id'          => 'required|nullable',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        \App\Models\Service::create([
            's_name'            => $request->input('s_name'),
            'amount'            => $request->input('amount'),
            's_status'          => $request->input('s_status'),
            'venue_id'          => $request->input('venue_id'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Service added Successfully');

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
        $data['venues'] = \App\Models\Venue::all();
        $data['services'] = \App\Models\Service::select('id','s_name', 'amount', 's_status','venue_id')->find($id);

        return view('service.editService', $data);

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
            's_name'        => 'required',
            'amount'        => 'required|numeric',
            's_status'      => 'required',
            'venue_id'      => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        $services = \App\Models\Service::find($id);
        $services->update([
            's_name'            => $request->input('s_name'),
            'amount'            => $request->input('amount'),
            's_status'          => $request->input('s_status'),
            'venue_id'          => $request->input('venue_id'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Service Updated Successfully.');

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
        $services = \App\Models\Service::find($id);
        $services->delete();

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Service Deleted Successfully.');

        return redirect()->back();
    }
}
