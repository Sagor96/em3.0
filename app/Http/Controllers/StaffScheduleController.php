<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models;

class StaffScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['schedules'] = \App\Models\Schedule::with('event', 'venue','staffdetail')->select('id','created_at','event_id', 'venue_id','staffdetail_id')->orderBy('id')->get();
      
        return view('staffschedule.staffschedule', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['events'] = \App\Models\Event::all();
        $data['venues'] = \App\Models\Venue::all();
        $data['staffdetails'] = \App\Models\Staffdetail::all();
      
        return view('staffschedule.staffschedule', $data);
        
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
            'event_id'        => 'required',
            'venue_id'        => 'required',
            'staffdetail_id'  => 'required',
            
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        \App\Models\Schedule::create([
            'event_id'        => $request->input('event_id'),
            'venue_id'        => $request->input('venue_id'),
            'staffdetail_id'  => $request->input('staffdetail_id'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Staff Schedule added Successfully');

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
        $data['events'] = \App\Models\Event::all();
        $data['venues'] = \App\Models\Venue::all();
        $data['staffdetails'] = \App\Models\Staffdetail::all();
        
        $data['schedules'] = \App\Models\Schedule::select('id','event_id', 'venue_id', 'staffdetail_id')->find($id);

        return view('staffschedule.editstaffschedule', $data);

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
            'event_id'        => 'required|integer',
            'venue_id'        => 'required|integer',
            'staffdetail_id'  => 'required|integer',
            
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        $schedules = \App\Models\Schedule::find($id);
        $schedules->update([
            'event_id'            => $request->input('event_id'),
            'venue_id'            => $request->input('venue_id'),
            'staffdetail_id'      => $request->input('staffdetail_id'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Staff Schedule Updated Successfully.');

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
        $schedule = \App\Models\Schedule::find($id);
        $schedule->delete();

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Staff Schedule Deleted Successfully.');

        return redirect()->back();
    }
}
