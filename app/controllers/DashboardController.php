<?php 
class DashboardController extends BaseController {




//Dashboard view return

	

	function check(){

		if (Session::has('current_user'))
		{
			return true;
		}
		else
		{
			return false;
			
		}
		
	}

	function show_menu(){



		$active= $this->check();
		if ($active) {
			$Session= Session::all();
			return View::make('Dashboard', compact('Session'));	

		}
		else{
			return Redirect::to('login');
		}




	}

	function store(){
		


		$student_no= $_POST['studentNumber'];
		Session::put('student_no', $student_no);
		$Session= Session::all();
		$previousEntry= $this->check_for_entries($student_no);

		$entries= DB::table('Students')->where('student_id', $student_no)->get();
		
		$info = DB::table('Students_infos')->where('student_id', $student_no)->first();

		if (!$info) {

			return View::make('new_entry', compact('Session'));



		}




		if (Session::has('entry_date'))
		{

			return View::make('datewise_entry', compact('Session', 'entries','info'));



		}
		else
		{
			
			


			if ($previousEntry>0) {

				return View::make('next_entry', compact('Session','entries', 'info'));
			}
			elseif ($previousEntry==0) {

				return View::make('first_entry', compact('Session', 'info'));
			}


		}


	}
	
	function check_for_entries($student_no){

		$entries= Students::all();
		$counter=0;
		foreach ($entries as $entry) {
			
			if ($entry->student_id==$student_no) {
				$counter++;
			}

		}

		return $counter;
	}

	function throw_entry(){

		
		$student_no= Session::get('student_no');
		$info = DB::table('Students_infos')->where('student_id', $student_no)->first();
		// \Session::put('entry_flag', true);


		if (Session::has('entry_date'))
		{


			$entry_date= Session::get('entry_date');

			DB::table('Students')->insert(
				['student_id' => $info->student_id, 'student_name' => $info->student_name, 'entry_time'=> $entry_date]);

			$total_count= DB::table('Students')->where('student_id', $info->student_id)->count();
			$temp_count=$total_count;
			if ($temp_count>3) {

				$temp_count=$total_count%3;
				if ($temp_count=='0') {
					$temp_count=3;
				}
			}

			$previousEntry= $this->check_for_entries($info->student_id)-1;
			if ($previousEntry=='0') {
	  	//insert record in counter table
				DB::table('Counters')->insert(
					['student_id' => $info->student_id, 'total_counter' => $total_count, 'temp_counter'=> $temp_count]);

			}
			else{
	  	//update record in counter table

				DB::table('Counters')
				->where('student_id', $info->student_id)
				->update(['total_counter' => $total_count]);
				DB::table('Counters')
				->where('student_id', $info->student_id)
				->update(['temp_counter' => $temp_count]);

			}


			return Redirect::to('datewise');


		}
		else
		{


			DB::table('Students')->insert(
				['student_id' => $info->student_id, 'student_name' => $info->student_name, 'entry_time'=> \Carbon\Carbon::now()]);


			$total_count= DB::table('Students')->where('student_id', $info->student_id)->count();
			$temp_count=$total_count;
			if ($temp_count>3) {

				$temp_count=$total_count%3;
				if ($temp_count=='0') {
					$temp_count=3;
				}
			}

			$previousEntry= $this->check_for_entries($info->student_id)-1;
			if ($previousEntry=='0') {
	  	//insert record in counter table
				DB::table('Counters')->insert(
					['student_id' => $info->student_id, 'total_counter' => $total_count, 'temp_counter'=> $temp_count]);

			}
			else{
	  	//update record in counter table

				DB::table('Counters')
				->where('student_id', $info->student_id)
				->update(['total_counter' => $total_count]);
				DB::table('Counters')
				->where('student_id', $info->student_id)
				->update(['temp_counter' => $temp_count]);

			}

			//$Session= \Session::all();

			return Redirect::to('dashboard');

			
		}
		



		

	}

	function datewise_entry(){

		if (Session::has('entry_date')) {
			
			$Session= Session::all();

			return View::make('datewise', compact('Session'));
		}

		else{

			$entry_date= $_POST['entryDate'];
			Session::put('entry_date', $entry_date);
			$Session= Session::all();

			return View::make('datewise', compact('Session'));		
		}

	}

	function new_datewise_entry(){

		$entry_date= $_POST['entryDate'];
		Session::put('entry_date', $entry_date);
		$Session= Session::all();

		return View::make('datewise', compact('Session'));	
		//return View::make('dashboard');


	}


	function back_button(){

		if (Session::has('entry_date')) {
			
			Session::forget('entry_date');
		}
		$active= $this->check();
		if ($active) {
			//$Session= \Session::all();
			//return view('Dashboard', compact('Session'));	
			return Redirect::to('dashboard');
		}
		else{
			return Redirect::to('login');
		}





	}

	function new_entry(){


		$name=$_POST['studentName'];
		$year=$_POST['studentYear'];
		$student_no=$_POST['studentNumber'];
		$branch=$_POST['studentBranch'];

		
		DB::table('Students_infos')->insert(
			['student_id' => $student_no, 'student_name' => $name, 'year'=> $year, 'branch'=>$branch]);


		DB::table('Students')->insert(
			['student_id' => $student_no, 'student_name' => $name, 'entry_time'=> \Carbon\Carbon::now()]);

		DB::table('Counters')->insert(
			['student_id' => $student_no, 'total_counter' => "1", 'temp_counter'=> "1"]);
		
		return Redirect::to('dashboard');
		

	}




	
}
