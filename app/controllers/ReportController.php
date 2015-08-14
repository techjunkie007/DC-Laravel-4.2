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

	//
	function generate_report(){
		
		

		 	$fromDate=$_POST['reportFromDate'];
		 	$toDate=$_POST['reportToDate'];
		 	$branch=$_POST['branch'];
		 	
		 	if($branch =='0'){
		 	$entries= Students::latest('entry_time')->where('entry_time', '<=', $toDate)
		 											->where('entry_time', '>=', $fromDate)
		 											->get();
		 	}
		 	else{
		 		
		 		switch ($branch) {
		 			case 1:
		 				$branch="CS";
		 				break;
		 			case 2:
		 				$branch="IT";
		 				break;
		 			case 3:
		 				$branch="EC";
		 				break;
		 			case 4:
		 				$branch="EN";
		 				break;
		 			case 5:
		 				$branch="EI";
		 				break;
		 			case 6:
		 				$branch="CE";
		 				break;
		 			case 7:
		 				$branch="ME";
		 				break;
		 			case 8:
		 				$branch="MCA";
		 				break;
		 			case 9:
		 				$branch="MBA";
		 				break;
		 			}

		 		$entries= Students::latest('entry_time')->where('entry_time', '<=', $toDate)
		 											->where('entry_time', '>=', $fromDate)
		 											->get();
		 	}
		 	
		 	return View::make('range_report')->with('entries',$entries)
		 	->with('branch',$branch)
		 	->with('fromDate',$fromDate)
		 	->with('toDate',$toDate);
		 	

		 

		 
		
	}
	function daily_report_menu(){

		return View::make('daily_report');

	}
	function daily_report(){

		 	$date=$_POST['reportDate'];
		 	
		 	$branch=$_POST['branch'];

		 	if($branch =='0'){
		 	$entries= Students::latest('entry_time')->where('entry_time', '=', $date)
		 											->get();
		 	}
		 	else{
		 		
		 		switch ($branch) {
		 			case 1:
		 				$branch="CS";
		 				break;
		 			case 2:
		 				$branch="IT";
		 				break;
		 			case 3:
		 				$branch="EC";
		 				break;
		 			case 4:
		 				$branch="EN";
		 				break;
		 			case 5:
		 				$branch="EI";
		 				break;
		 			case 6:
		 				$branch="CE";
		 				break;
		 			case 7:
		 				$branch="ME";
		 				break;
		 			case 8:
		 				$branch="MCA";
		 				break;
		 			case 9:
		 				$branch="MBA";
		 				break;
		 			
		 			
		 		}

		 		$entries= Students::latest('entry_time')->where('entry_time', '=', $date)
		 											->get();
		 		}
		 	
		 	
		 	return View::make('daily_report')
		 	->with('entries',$entries)
		 	->with('branch',$branch)
		 	->with('date',$date);
		 	



	}

	//Generate Three Entry Report
	function generate_three_entry_report()
	{
		//Retrieve Entries from Counters Table
		$entries = DB::table('Counters')->where('temp_counter', '3')->get();
		//Three Report View 
		return View::make('three_entry_report')->with('entries',$entries);
	}

	//Download the Word Document of Report
	function download_report()
	{
		//Retrieve Entries from Counters Table
		$entries = DB::table('Counters')->where('temp_counter', '3')->get();
		//Report Download View
		return View::make('generated_three_entry_report')->with('entries',$entrzies);
	}

	//Generate Range Report
	function generate_range_report()
	{
		$from_date =Input::get('reportFromDate');
		$to_date =Input::get('reportToDate');
		$branch=Input::get('branch');
		//Specify Branch
		$branch_char= $this->specify_branch($branch);
		//Retrieve Entries from Students
		$entries= DB::table('Students')->select('student_id','entry_time')
										->where('entry_time', '>=', $from_date)
									   ->where('entry_time', '<=', $to_date)->get();

		return View::make('range_report')->with('entries', $entries)
										 ->with('branch', $branch_char)
										 ->with('from_date', $from_date)
										 ->with('to_date', $to_date);								

	}

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
