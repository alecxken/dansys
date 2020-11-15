<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
class IncidentController extends Controller
{
    //

    public function new()
	{
	
		return view('new');
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
