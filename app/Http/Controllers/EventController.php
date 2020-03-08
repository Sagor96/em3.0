<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models;
use App\Models\Contact;
use App\Models\Type;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
      $data['events'] = \App\Models\Event::with('contact', 'type')->select('id','contact_id','e_name', 'type_id','e_date')->orderBy('id')->get();
      
        return view('event.event', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['contacts'] = \App\Models\Contact::all();
        $data['types'] = \App\Models\Type::all();
      
        return view('event.createEvent', $data);
        
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
            'contact_id'        => 'required',
            'e_name'            => 'required',
            'type_id'           => 'required',
            'e_date'            => 'required|date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        \App\Models\Event::create([
            'contact_id'        => $request->input('contact_id'),
            'e_name'            => $request->input('e_name'),
            'type_id'           => $request->input('type_id'),
            'e_date'            => $request->input('e_date'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Event added Successfully');

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
        $data['contacts'] = \App\Models\Contact::all();
        $data['types'] = \App\Models\Type::all();
        $data['events'] = \App\Models\Event::select('id','contact_id', 'e_name', 'type_id','e_date')->find($id);

        return view('event.editEvent', $data);

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
            'contact_id'        => 'required|integer',
            'e_name'            => 'required',
            'type_id'           => 'required|integer',
            'e_date'            => 'required|date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        $hosting = \App\Models\Event::find($id);
        $hosting->update([
            'contact_id'            => $request->input('contact_id'),
            'e_name'                => $request->input('e_name'),
            'type_id'               => $request->input('type_id'),
            'e_date'                => $request->input('e_date'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Event Updated Successfully.');

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
        $event = \App\Models\Event::find($id);
        $event->delete();

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Event Deleted Successfully.');

        return redirect()->back();
    }
}
