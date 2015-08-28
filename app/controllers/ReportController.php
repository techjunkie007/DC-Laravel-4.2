<?php 

class ReportController extends BaseController {

	//Show Report Menu 
	function report_menu()
	{
		if(Auth::check())
		{
			//Report Panel View
			return View::make('report');
		}
		else
		{
			//Login Again with Message
			return Redirect::to('login')->with('message','You are not Authenticated, Login Again');
		}

	}

	//Generate Daily Report
	function generate_daily_report()
	{
		if(Auth::check())
		{
			$report_date= Input::get('reportDate');
			$branch_id= Input::get('branch');
			$branch_char = $this->specify_branch($branch_id);

			//Store Details in Session
			Session::put('daily_date', $report_date);
			Session::put('branch', $branch_char);

			// Retrieve All Entries
			$entries= Students::latest('entry_time')->where('entry_time', '=', $report_date)
		 											->get();
		
			return View::make('daily_report')
		 			->with('entries',$entries)
		 			->with('branch',$branch_char)
		 			->with('date',$report_date);
		}
		else
		{
			//Login Again with Message
			return Redirect::to('login')->with('message','You are not Authenticated, Login Again');
		}
	}

	//Generate Three Entry Report
	function generate_three_entry_report()
	{
		if(Auth::check())
		{
			//Retrieve Entries from Counters Table
			$entries = DB::table('Counters')->where('temp_counter', '3')->get();
			//Three Report View 
			return View::make('three_entry_report')->with('entries',$entries);
		}
		else
		{
			//Login Again with Message
			return Redirect::to('login')->with('message','You are not Authenticated, Login Again');
		}
	}

	//Download the Word Document of Three Entry Report
	function download_three_entry_report()
	{
		if(Auth::check())
		{
			//Retrieve Entries from Counters Table
			$entries = DB::table('Counters')->where('temp_counter', '3')->get();
			//Report Download View
			return View::make('generated_three_entry_report')->with('entries',$entries);
		}
		else
		{
			//Login Again with Message
			return Redirect::to('login')->with('message','You are not Authenticated, Login Again');
		}
	}

	//Download the Word Document of Daily Report
	function download_daily_report()
	{
		if(Auth::check())
		{
			$report_date= Session::get('daily_date');
			$branch= Session::get('branch');

			// Flush Session Entries
			Session::forget(array('daily_date', 'branch'));

			// Retrieve All Entries
			$entries= Students::latest('entry_time')->where('entry_time', '=', $report_date)
		 											->get();
			//Report Download View
			return View::make('generated_daily_report')->with('entries', $entries)
													->with('branch', $branch)
													->with('date', $report_date);
		}
		else
		{
			//Login Again with Message
			return Redirect::to('login')->with('message','You are not Authenticated, Login Again');
		}
	}

	//Generate Range Report
	function generate_range_report()
	{
		if(Auth::check())
		{
			$from_date =Input::get('reportFromDate');
			$to_date =Input::get('reportToDate');
			$branch=Input::get('branch');

			//Specify Branch
			$branch_char= $this->specify_branch($branch);

			//Store Details in Session
			Session::put('to_date', $to_date);
			Session::put('from_date', $from_date);
			Session::put('branch', $branch_char);

			//Retrieve Entries from Students
			$entries= DB::table('Students')->select('student_id','entry_time')
										->where('entry_time', '>=', $from_date)
									   ->where('entry_time', '<=', $to_date)->get();
			//Return View Range Report
			return View::make('range_report')->with('entries', $entries)
										 ->with('branch', $branch_char)
										 ->with('from_date', $from_date)
										 ->with('to_date', $to_date);								
		}
		else
		{
			//Login Again with Message
			return Redirect::to('login')->with('message','You are not Authenticated, Login Again');
		}

	}

	//Download the Word Document of Range Report
	function download_range_report()
	{
		if(Auth::check())
		{
			$to_date= Session::get('to_date');
			$from_date= Session::get('from_date');
			$branch= Session::get('branch');

			// Flush Session Entries
			Session::forget(array('to_date', 'from_date', 'branch'));

			//Retrieve Entries from Students
			$entries= DB::table('Students')->select('student_id','entry_time')
										->where('entry_time', '>=', $from_date)
									   ->where('entry_time', '<=', $to_date)->get();
			//Report Download View
			return View::make('generated_range_report')->with('entries', $entries)
													->with('branch', $branch)
													->with('from_date', $from_date)
													->with('to_date', $to_date);
		}
		else
		{
			//Login Again with Message
			return Redirect::to('login')->with('message','You are not Authenticated, Login Again');
		}
	}

	//Specifies Branch Name from Branch ID
	function specify_branch($branch_id)
	{
		$branch_char='';
		switch ($branch_id) 
		{
			case 0:
				$branch_char='All';
				break;
			case 1:
				$branch_char='CS';
				break;
			case 2:
				$branch_char='IT';
				break;
			case 3:
				$branch_char='EC';
				break;
			case 4:
				$branch_char='EN';
				break;
			case 5:
				$branch_char='EI';
				break;
			case 6:
				$branch_char='CE';
				break;
			case 7:
				$branch_char='ME';
				break;
			case 8:
				$branch_char='MCA';
				break;
			case 9:
				$branch_char='MBA';
				break;
		}
		return $branch_char;
	}

}
