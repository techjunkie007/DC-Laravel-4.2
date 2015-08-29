<?php 

class DashboardController extends BaseController 
{
	//Show Dashboard
	function show_menu()
	{
		//Check if Authenticated
		if(Auth::check())
		{

			//View Dashboard
			return View::make('dashboard');
		}
		else
		{	
			//Login Again with Message
			return Redirect::to('login')->with('message','You are not Authenticated, Login Again');
		}
	}

	//Show Student Information
	function show_student()
	{
		if (Auth::check())
		{
			$student_no= Input::get('studentNumber');

			//Store Student Number in Session
			Session::put('student_no', $student_no);
		
			$previousEntry= $this->check_for_entries($student_no);

			//$entries= DB::table('Students')->where('student_id', $student_no)->get();
		
			$info = DB::table('Students_infos')->where('student_id', $student_no)->first();

			//Checking if Student Exists
			if (!$info) 
			{
				//View New Entry of Student
				return View::make('new_entry');
			}

			//Checking if it is a Datewise Entry
			if (Session::has('entry_date'))
			{
				//Datewise Entry View
				return View::make('datewise_entry')->with('info', $info)
											->with('counter', $previousEntry);
			}
			else
			{
				//Student was Late Earlier
				if ($previousEntry>0) 
				{
					//Next Entry View
					return View::make('next_entry')->with('info', $info)
												->with('counter', $previousEntry);
				}	
				//Student's First Late Entry
				elseif ($previousEntry==0) 
				{
					//First Entry View
					return View::make('first_entry')->with('info', $info);
				
				}
			}
		}
		else
		{
			//Login Again with Message
			return Redirect::to('login')->with('message','You are not Authenticated, Login Again');

		}
	}

	//Check Number of Entries
	function check_for_entries($student_no)
	{
		$entries= Students::where('student_id', '=', $student_no)->get();
		$counter=count($entries);
		return $counter;
	}

	
	//Datewise Entry 
	function datewise_entry()
	{
		if(Auth::check())
		{
			$entry_date= Input::get('entryDate');
		
			//Put Entry Date in Session for further use
			Session::put('entry_date', $entry_date);

			//Datewise Dashboard View
			return View::make('datewise');
		}
		else
		{
			//Login Again with Message
			return Redirect::to('login')->with('message','You are not Authenticated, Login Again');

		}

	}
	

	//Saves Late Entry
	function save_entry()
	{
		if(Auth::check())
		{
			//Get Student ID
			$student_no= Session::get('student_no');
			//Check if Datewise Entry is going on
			if (Session::has('entry_date')) 
			{
				//Get Entry Date, if Datewise
				$entry_date= Session::get('entry_date');

				//Forget Student Number from Session
				Session::forget('student_no');
			
				//Call Function to Populate Database
				$this->save_in_db($student_no, $entry_date);

				//Flash Message
				$message= "Late Entry for Student Number ". $student_no. ", on Date ". date("d-M-Y",strtotime($entry_date))." successfully registered.";

				//Redirect to Datewise Dashboard for more Datewise Entries
				return Redirect::to('datewise_again')->with('message', $message);
			}
			//Else if it is a Normal Entry
			else
			{
				//Today's Date
				$entry_date= date("Y-m-d");

				//Call Function to Populate Database
				$this->save_in_db($student_no, $entry_date);

				//Forget Student Number from Session
				Session::forget('student_no');

				//Flash Message
				$message= "Today's Late Entry for Student Number ". $student_no. " successfully registered.";

				//Redirect to Dashboard for Today's Entry
				return Redirect::to('dashboard')->with('message', $message);
			}
		}
		else
		{
			//Login Again with Message
			return Redirect::to('login')->with('message','You are not Authenticated, Login Again');
		}
	}

	//Common Function to Update Database
	function save_in_db($student_no, $entry_date)
	{
		//Taking Student Info 
		$info = DB::table('Students_infos')->where('student_id', $student_no)->first();

		//Inserting Entry in Table Students
		DB::table('Students')->insert(['student_id' => $info->student_id, 'student_name' => $info->student_name, 'entry_time'=> $entry_date]);

		//Total Count to Update Counter Table 
		$total_count= DB::table('Students')->where('student_id', $info->student_id)->count();
		$temp_count= $total_count;
		
		//Counter Logical Cycle
		if ($temp_count>3) 
		{
			$temp_count=$total_count%3;
			if ($temp_count=='0') 
			{
				$temp_count=3;
			}
		}
		//Entry Count in Counter Table
		$counter_entry= DB::table('Counters')->where('student_id', $info->student_id)->count();
		if ($counter_entry==0) 
		{
			//Insert First Entry in Counter Table
			DB::table('Counters')->insert(['student_id' => $info->student_id, 'total_counter' => $total_count, 'temp_counter'=> $temp_count]);

		}
		else
		{
			//Update Entry in Counter Table
			DB::table('Counters')
				->where('student_id', $info->student_id)
				->update(array('total_counter'=> $total_count, 'temp_counter'=> $temp_count));
		}
	}

	//Add New Student
	function add_student()
	{
		if(Auth::check())
		{
			$student_no=Input::get('studentNumber');
			//Add Student to Database
			DB::table('Students_infos')->insert(['student_id' => $student_no,'student_name' => Input::get('studentName'), 'year' => Input::get('studentYear'), 'branch' => Input::get('studentBranch') ]);
			$message= "New Student with Student Number ". $student_no. " added to Database.";
			return Redirect::to('dashboard')->with('message', $message);
		}
		else
		{
			//Login Again with Message
			return Redirect::to('login')->with('message','You are not Authenticated, Login Again');
		}
	}

	//Back Button 
	function back_button()
	{	
		if(Auth::check())
		{
			//Forget Student Number from Session
			Session::forget('entry_date');

			$message= "We are back to Today, Enter today's Late Entry";
		
			//Redirect to Dashboard after all datewise entries
			return Redirect::to('dashboard')->with('message', $message);
		}
		else
		{
			//Login Again with Message
			return Redirect::to('login')->with('message','You are not Authenticated, Login Again');

		}
	}
}

