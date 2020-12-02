<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Incident;
use App\Escalation;
use App\SosCompany;
use Auth;
class IncidentController extends Controller
{
    //



    //

    public function new()
	{
		$data = Company::all();
		$incidents = Incident::all();
			$datas =Escalation::all()->groupBy('sos_location');
		
		return view('new',compact('data','incidents','datas'));
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


	#Create a compnay
	public function createsoscompany()
	{
		$data = SosCompany::all();
		$datas =Escalation::all();
		return view('responders',compact('data','datas'));
	}

	

#get a compnay
	public function getsoscompany($id)
	{
		$data = SosCompany::all()->where('id',$id)->first();
		return $data;
	}

#get a compnay
	public function deletesoscompany($id)
	{
		$data = SosCompany::findorfail($id);
		$data->delete();
		return back()->with('danger','deleted successfully');
	
	}

	#Store Company


#update Company
#Store Company
	public function storesoscompany(Request $request)
	{
	   $data = new SosCompany();
       $data->name = $request->input('name');
       $data->email = $request->input('email');
       $data->location = $request->input('location');
       $data->phone = $request->input('phone');
       $data->status = 'Active';
       $data->save();

       return back()->with('status','Registered');
	}

#update Company
	public function updatesoscompany(Request $request)
	{
	   $id = $request->input('company_id');
	   $data = SosCompany::findorfail($id);
       $data->name = $request->input('name');
       $data->email = $request->input('email');
       $data->location = $request->input('location');
       $data->phone = $request->input('phone');
       $data->save();

       return back()->with('status','Updated');
	}


		public function storerespondercompany(Request $request)
	{
	   $data = new Escalation();
	   $n = strtoupper($request->input('sos_company').'-'.$request->input('sos_name'));
       $data->sos_name = $n;
       $data->sos_location = $request->input('sos_location');
       $data->sos_phone = $request->input('sos_phone');
        $data->save();

       return back()->with('status','Registered');
	}

#update Company
	public function updaterespondercompany(Request $request)
	{
	   $id = $request->input('company_id');
	   $data = Escalation::findorfail($id);
         $n = strtoupper($request->input('sos_company').'-'.$request->input('sos_name'));
       $data->sos_name = $n;
       $data->sos_location = $request->input('sos_location');
       $data->sos_phone = $request->input('sos_phone');
       $data->save();

       return back()->with('status','Updated');
	}
}
