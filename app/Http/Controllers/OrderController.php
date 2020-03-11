<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['orders'] = \App\Models\Order::with('contact', 'payment')->select('id','created_at','contact_id','payment_id','order_total')->orderBy('id')->get();
      
        return view('order.order', $data);
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
        $data['payments'] = \App\Models\Payment::all();
      
        return view('order.order', $data);
        
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
            'contact_id'            => 'required',
            'payment_id'            => 'required',
            'order_total'           => 'required|numeric',
            
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        \App\Models\Order::create([
            'contact_id'        => $request->input('contact_id'),
            'payment_id'        => $request->input('payment_id'),
            'order_total'       => $request->input('order_total'),
            
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Order added Successfully');

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
        $data['payments'] = \App\Models\Payment::all();
        $data['orders'] = \App\Models\Order::select('id','created_at','contact_id', 'payment_id','order_total')->find($id);

        return view('order.editOrder', $data);

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
            'payment_id'        => 'required|integer',
            'order_total'       => 'required|numeric',
            
            
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        $events = \App\Models\Order::find($id);
        $events->update([
            'contact_id'            => $request->input('contact_id'),
            'payment_id'            => $request->input('payment_id'),
            'order_total'           => $request->input('order_total'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Order Updated Successfully.');

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
        $order = \App\Models\Order::find($id);
        $order->delete();

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Order Deleted Successfully.');

        return redirect()->back();
    }
}
