<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Incident;
use Auth;
class IncidentController extends Controller
{
    //

    public function new()
	{
		$data = Company::all();
		$incidents = Incident::all();
		return view('new',compact('data','incidents'));
	}

	  public function myincident()
	{
		///$data = Company::all();
		$data = Incident::all();
		//return $data;
		return view('mydata',compact('data'));
	}
#Create a compnay
	public function createcompany()
	{
		$data = Company::all();
		return view('newcompany',compact('data'));
	}

	

#get a compnay
	public function getcompany($id)
	{
		$data = Company::all()->where('id',$id)->first();
		return $data;
	}

#get a compnay
	public function deletecompany($id)
	{
		$data = Company::findorfail($id);
		$data->delete();
		return back()->with('danger','deleted successfully');
	
	}

	#Store Company
	public function storeincident(Request $request)
	{

	   $data = new Incident();
		$data->company_name = $request->input('company');
		$data->user_id =Auth::id();
		$data->sos_message = $request->input('incident');
		$data->sos_location = $request->input('location');
		$data->sos_status = 'pending';
       $data->save();

       return back()->with('status','Registered');
	}

#update Company
#Store Company
	public function storecompany(Request $request)
	{
	   $data = new Company();
       $data->company_name = $request->input('company_name');
       $data->company_address = $request->input('company_address');
       $data->company_phone = $request->input('company_phone');
       $data->status = $request->input('status');
       $data->save();

       return back()->with('status','Registered');
	}

#update Company
	public function updatecompany(Request $request)
	{
	   $id = $request->input('company_id');
	   $data = Company::findorfail($id);
       $data->company_name = $request->input('company_name');
       $data->company_address = $request->input('company_address');
       $data->company_phone = $request->input('company_phone');
       $data->status = $request->input('status');
       $data->save();

       return back()->with('status','Registered');
	}
}
