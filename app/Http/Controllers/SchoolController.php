<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Course;
use App\CourseChecklist;
use App\User;
use App\AppData;
use App\AppMarks;
use App\AppChecklist;
use Token;
class SchoolController extends Controller
{


	public function applynow()
	{
		$data = CourseChecklist::all();
		$data1 = Course::all();
	   $token = Token::Unique('courses','course_code',5);

		return view('school.newapplicant',compact('data','data1','token'));
	}

		public function applicants()
	{
		$data1 = AppData::all();
		
		return view('school.viewapplicant',compact('data1'));
	}

	public function myapplicants()
	{
		$data1 = AppData::all();
		
		return view('school.adminview',compact('data1'));
	}



	public function continue(Request $request)
	{
		$checklist = CourseChecklist::all()->where('course_code',$request->input('course_code'));

		 $this->validate($request, [
                                       'token' => 'required|unique:app_data',
                                      'course_code' => 'required',
                                      'course_done' => 'required',
                                      'institution' => 'required',
                                     
                                  ]
                                ); 
		$data = new AppData();
		$data->token = $request->input('token');
		$data->applicant = $request->input('applicant');
		$data->course_done = $request->input('course_done');
		$data->institution = $request->input('institution');
		$data->grade = $request->input('grade');
		$data->course_code = $request->input('course_code');
		$data->status = 'Pending';
		$data->marks = 0;
		$data->save();

		$token = $request->input('token');;
		

		return view('school.checklistapp',compact('checklist','token'));
	}

	public function coursechk()
	{
		$data = CourseChecklist::all();
		$data1 = Course::all();

		return view('school.coursechecklist',compact('data','data1'));
	}

	public function storecoursechk(Request $request)
	{

		$data = new CourseChecklist();
		$data->course_code = $request->input('course_code');
		$data->checklist_name = $request->input('checklist');
		$data->save();

		return back()->with('status','Successfully ');

		return view('school.coursechecklist',compact('data'));
	}

	public function savefinal(Request $request)
	{

 $v  =  array_count_values($request->input('passed'));
              if (empty($v['Yes'])) {
                $pass = 0;
              }
              else {
                $pass = $v['Yes'];
              }

               if (empty($v['No'])) {
                $fail = 0;
              }
              else {
                $fail = $v['No'];
              }
          
              $total = $pass + $fail;
              $percentage = round(($pass*100)/$total);
              $token = $request->input('token');

           

		 foreach ($request->input('checklist') as $key => $value)
                     {
                        $empty = $request->input('checklist')[$key];
                        if(is_null($empty))
                        {
                            $insert4 = [];
                        }
                         else
                         {
                              $insert4[] =
                                     [
                                      'token' => $token,  
                                       'checklist'  => $request->input('checklist')[$key],     
                                      'passed'  => $request->input('passed')[$key],
                                      'created_at' => \Carbon\Carbon::now(),
                                      
                      
                                     ];                      # code...
                         }                    
                     
                     }

                  $re =  \App\AppMarks::all()->where('ref_token',$token)->first();       
                  if (empty($re)) 
                  {
                   $data = new AppMarks();
					$data->ref_token = $token;
					$data->total = $token;
					$data->passed = $pass;
					$data->percentage = $percentage;
				    $data->save();
                  }
                  else
                  {
                       $app =  \App\AppMarks::findorfail($re->id);
                      	$data->ref_token = $token;
					$data->total = $token;
					$data->passed = $pass;
					$data->percentage = $percentage;
				    $data->save();
                  }

		 if(!empty($insert4)){\DB::table('app_checklists')->insert($insert4);}
		 $app = AppData::all()->where('token',$token)->first();
		 $data =  AppData::findorfail($app->id);
		 $data->status = 'Complete';
		 $data->save();
		return  redirect('view-apps')->with('status','success');
	}

	
	public function deletechecklist($id)
	{
		$data = CourseChecklist::findorfail($id);
		$data->delete();
		return back()->with('danger','Successfully deleted');

	}


	public function createskul()
	{
		$data = School::all();
		$data1 = Course::all();
		return view('school.createskul',compact('data','data1'));
	}

	public function storeskul(Request $request)
	{
		$data = new School();
		$data->name = $request->input('school_name');
		$data->save();
		return back()->with('status','Successfully Registered');
	}

	

	public function storecos(Request $request)
	{
		$token = Token::Unique('courses','course_code',5);
		$token = Token::Unique('courses','course_code',5);
                    $t = date("Y",strtotime("now"));
                    $token = strtoupper('KABU-'.$token.'-'.$t); 
		$data = new Course();
		$data->school_id = $request->input('skul');
		$data->course_code = $token;
		$data->course_name = $request->input('cos_name');
		$data->save();
		return back()->with('status','Successfully Registered');
		return view('school.createskul');
	}

	public function createchecklist()
	{
		return view('school.createskul');
	}

	public function storechecklist()
	{
		return view('school.createskul');
	}

}
