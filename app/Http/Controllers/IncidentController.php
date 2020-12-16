<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Incident;
use App\Escalation;
use App\SosCompany;
use App\ActionComments;
use Auth;
USE App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class IncidentController extends Controller
{
    //



    //

    public function new()
	{
		$data = Company::all();
		$incidents = Incident::all();
			$datas =Escalation::all();
		
		return view('new',compact('data','incidents','datas'));
	}

	  public function myincident()
	{
		///$data = Company::all();
		$data = Incident::all();
		//return $data;

		return view('mydata',compact('data'));
	}


	  public function sentincidents()
	{
		///$data = Company::all();

		$data = Incident::all()->where('sos_company','');
		//return $data;

		return view('mydata',compact('data'));
	}

	public function sosresponders()
	{
		///$data = Company::all();
		
		$data = Incident::all()->where('sos_company',\Auth::user()->name);


		//return $data;

		return view('data.soslist',compact('data'));
	}

		public function sosrespondersapi()
	{
		///$data = Company::all();
		
		$data = Incident::all()->where('sos_company',\Auth::user()->name);


		//return $data;

		return view('data.sosclosed',compact('data'));
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

//
	public function dropincident($id)
	{
		$data = Incident::findorfail($id);
		$data->delete();

		return back()->with('danger','Deleted');
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

		$escalations = Escalation::all()->where('sos_name',$request->input('sos_company'))->first();
		// return $escalations;

	   $data = new Incident();
	   $data->sos_company= $escalations->sos_company;
	   $data->sos_name= $request->input('sos_company');
		$data->company_name = $request->input('company');
		$data->user_id =Auth::id();
		$data->sos_message = $request->input('incident');
		$data->sos_location = $escalations->sos_location;
		$data->sos_status = 'pending';

		
       $data->save();

       return back()->with('status','Registered');
	}

	public function getactionincident($id)
	{
		$data = Incident::all()->where('id',$id)->first();

		return $data;

	}

	#Store Company
	public function actionincident(Request $request)
	{

		$escalations = Incident::all()->where('id',$request->input('incident_id'))->first();
		
	//	return $request;

	   $data = Incident::findorfail($escalations->id);
	   $data->sos_status = $request->input('incident_status');		
       $data->save();

       $comments = new ActionComments();
	   $comments->incident_id = $request->input('incident_id');
	   $comments->incident_status = $request->input('incident_status');
	   $comments->comments = $request->input('comments');
	   $comments->date = \Carbon\Carbon::today();
	   $comments->actioned_by = \Auth::id();
	   $comments->save();




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

       $user = User::all()->where('email',$request->input('email'))->first();

       $pass = 'P@ssw0rd';
       if (!empty($user)) 
       {
       	$det = User::findorfail($user->id);
       	$det->name = $request->input('name');
        $det->email = $request->input('email');
       
        $det->save();
       }
       else
       {
       	$det = new User();
       	$det->name = $request->input('name');
        $det->email = $request->input('email');
        $det->password = \Hash::make($pass);
        $det->save();
       }

         $role_r = Role::where('name', '=', 'Responder')->firstOrFail();
            $det->assignRole($role_r); 

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
         $data->sos_company = $request->input('sos_company');
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
