<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models;


class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = [];
      $data['venues'] = \App\Models\Venue::select('id','v_name','v_addr','status')->get();
      return view('venues.venue', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = [];
      return view('venues.createVenue', $data);
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
          'v_name'      => 'required',
          'v_addr'      => 'required',
          'status'      => 'required',
      ];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }

      //insert to database
      \App\Models\Venue::create([
          'v_name'   => $request->input('v_name'),
          'v_addr'   => $request->input('v_addr'),
          'status'   => $request->input('status'),
      ]);

      //redirect
      session()->flash('type', 'success');
      session()->flash('message', 'Venue added Successfully');

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

      $data['venues'] = \App\Models\Venue::select('id','v_name','v_addr','status')->find($id);

      return view('venues.editVenue', $data);

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
          'v_name'      => 'required',
          'v_addr'      => 'required',
          'status'      => 'required',
      ];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }

      //insert to database
      $service = \App\Models\Venue::find($id);
      $service->update([
          'v_name'      => $request->input('v_name'),
          'v_addr'      => $request->input('v_addr'),
          'status'      => $request->input('status'),
      ]);

      //redirect
      session()->flash('type', 'success');
      session()->flash('message', 'Venue Updated Successfully.');

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
      $type = \App\Models\Venue::find($id);
      $type->delete();

      //redirect
      session()->flash('type', 'success');
      session()->flash('message', 'Data Deleted Successfully.');

      return redirect()->back();
    }
}
