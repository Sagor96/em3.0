<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models;


class StaffDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        $data['staffdetails'] = \App\Models\StaffDetail::select('id','staff_name', 'designation', 'phone', 'address')->orderBy('id')->get();


        return view('staffdetail.staffdetail', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view('staffdetail.staffdetail', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $rules = [
                'staff_name'    => 'required',
                'designation'   => 'required|max:80',
                'phone'         => 'required|numeric|regex:/(01)[0-9]{9}/',
                'address'       => 'required',
            ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        //insert to database
        \App\Models\StaffDetail::create([
            'staff_name'            => $request->input('staff_name'),
            'designation'           => $request->input('designation'),
            'phone'                 => $request->input('phone'),
            'address'               => $request->input('address'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Staff Detail added Successfully');

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
        $data['staffdetails'] = \App\Models\StaffDetail::select('id','staff_name','designation', 'phone','address')->find($id);
        return view('staffdetail.editStaffdetail', $data);
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
                'staff_name'    => 'required',
                'designation'   => 'required',
                'phone'         => 'required|numeric|regex:/(01)[0-9]{9}/',
                'address'       => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        


    $staffdetail = \App\Models\StaffDetail::find($id);
      $staffdetail->update([
          'staff_name'        => $request->input('staff_name'),
          'designation'       => $request->input('designation'),
          'phone'             => $request->input('phone'),
          'address'           => $request->input('address'),
      ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Staff Details Updated Successfully');

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
        $staffdetail = \App\Models\StaffDetail::find($id);
        $staffdetail->delete();

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Staff Detail Deleted Successfully.');

        return redirect()->back();

    }
}
