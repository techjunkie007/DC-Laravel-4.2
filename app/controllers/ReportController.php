<?php 

class ReportController extends BaseController {

	//Report Menu

	function report_menu(){

		return View::make('report');
		

	}
//Generate Report

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
	function three_entry(){


			$entries = DB::table('Counters')->where('temp_counter', '3')->get();
		 	return View::make('three_entry_report')->with('entries',$entries);
	}

	function download(){

		$entries = DB::table('Counters')->where('temp_counter', '3')->get();

		 	return View::make('generated_three_entry_report')->with('entries',$entries);
	}

}
