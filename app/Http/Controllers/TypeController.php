<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;        
use Illuminate\Support\Facades\Validator;
use App\Models;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['types'] = \App\Models\Type::select('id','t_name', 't_detail')->orderBy('id')->get();
        return view('type.type', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view('type.type', $data);
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
            't_name'    => 'required',
            't_detail'  => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        \App\Models\Type::create([
            't_name'                => $request->input('t_name'),
            't_detail'              => $request->input('t_detail'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Catagory added Successfully');

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
        $data['types'] = \App\Models\Type::select('id', 't_name',  't_detail')->find($id);

        return view('type.editType', $data);
    
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
            't_name'    => 'required',
            't_detail'  => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        $type = \App\Models\Type::find($id);
        $type->update([
            't_name'    => $request->input('t_name'),
            't_detail'  => $request->input('t_detail'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Catagory Updated Successfully.');

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
        $type = \App\Models\Type::find($id);
        $type->delete();

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Catagory Deleted Successfully.');

        return redirect()->back();
    }
}
