<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        $data['payments'] = \App\Models\Payment::select('id','p_method', 'p_status', 'p_date')->orderBy('id')->get();

        return view('payment.payment', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view('payment.payment', $data);
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
            'p_method'      => 'required',
            'p_status'      => 'required',
            'p_date'        => 'required|date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        //insert to database
        \App\Models\Payment::create([
            'p_method'              => $request->input('p_method'),
            'p_status'              => $request->input('p_status'),
            'p_date'                => $request->input('p_date'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Payment added Successfully');

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
        $data['payments'] = \App\Models\Payment::select('id','p_method','p_status', 'p_date')->find($id);
        return view('payment.editPayment', $data);
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
                'p_method'      => 'required',
                'p_status'      => 'required',
                'p_date'        => 'required|date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



    $staffdetail = \App\Models\Payment::find($id);
      $staffdetail->update([
            'p_method'              => $request->input('p_method'),
            'p_status'              => $request->input('p_status'),
            'p_date'                => $request->input('p_date'),
                  ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Payment Updated Successfully');

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
        $staffdetail = \App\Models\Payment::find($id);
        $staffdetail->delete();

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Payment Deleted Successfully.');

        return redirect()->back();

    }
}
