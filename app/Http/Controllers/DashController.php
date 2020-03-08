<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    public function showAdmin()
    {
        $data = [];
    // Admin count 
    	$data['admins_count'] = \App\Admin::select('name','email')->get();

    	$data['total_admins'] = count($data['admins_count']);
    	
	// Client count 
    	$data['clients_count'] = \App\Client::select('id','name','email')->get();

    	$data['total_clients'] = count($data['clients_count']);

    // Event count 
        $data['events_count'] = \App\Models\Event::select('id','contact_id','e_name' ,'type_id','e_date')->get();

        $data['total_events'] = count($data['events_count']);

    // Contact count 
        $data['contacts_count'] = \App\Models\Contact::select('id','contact_name', 'email', 'phone', 'address')->get();

        $data['total_contacts'] = count($data['contacts_count']);

    // StaffDetail count 
        $data['staffdetails_count'] = \App\Models\StaffDetail::select('id','staff_name', 'designation', 'phone', 'address')->get();

        $data['total_staffdetails'] = count($data['staffdetails_count']);

    // Payment count 
        $data['payments_count'] = \App\Models\Payment::select('id','p_method', 'p_status', 'p_date')->get();

        $data['total_payments'] = count($data['payments_count']);

    // Type count 
        $data['types_count'] = \App\Models\Type::select('id','t_name', 't_detail')->get();

        $data['total_types'] = count($data['types_count']);


    // Venue count 
        $data['venues_count'] = \App\Models\Venue::select('id','v_name','v_addr','status')->get();

        $data['total_venues'] = count($data['venues_count']);

    // Service count 
        $data['services_count'] = \App\Models\Service::select('id','s_name','amount','s_status','venue_id')->get();

        $data['total_services'] = count($data['services_count']);

        return view('admin.dashboard2', $data);
    }
}
