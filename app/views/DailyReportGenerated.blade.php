	<html>
	<head>
		<title>Late Entry | Daily Report</title>
		<!-- css file -->

		<!-- bootstrapcdn -->
	    {{HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css')}}
	    <!-- mainpage -->
	    {{HTML::style('css/mainpage.css')}}
	    <!-- inside css -->
	    {{HTML::style('css/inside.css')}}
	    <!-- clock1 css-->
	    {{HTML::style('css/report.css')}}
	  
	</head>

	<body>
		<div class="container-fluid">

			<!-- header -->
			
			<div class="header row">
				<div class="col-md-2 col-sm-1"></div>
				<h1 class="text-center center col-md-7 col-sm-8">AKGEC LATE ENTRY SYSTEM</h1>
				
				<!-- empty -->
				
				{{  Form::open(['route' => 'logout_submit']) }}
	 
	            <div class="col-md-1 col-sm-1"></div>
	 
	            <!-- logout button at top -->
	            
	            <button class="btn btn-default col-md-1 col-sm-1 logout">
	                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
	                <span> Logout</span>
	                
	                {{ Form::close() }}

				
				<!-- empty -->

				<div class="col-md-1 col-sm-1"></div>				
			</div>
			
			<div class="container block">
				<div class="row Heading">
					
					@if($branch=='0')
					<?php $branch="All" ?>
					@endif
					
					<h2 class="cl-md-offset-1 tb">Records Report of Date {{ $date}} for {{$branch}} Branch :</h2>
					<div class="overflo">
						<table class="table">
							<thead>
								<td><h4>S.No.</h4></td>
								<td><h4>Student No.</h4></td>
								<td><h4>Name</h4></td>
								<td><h4>Branch</h4></td>
								<td><h4>Year</h4></td>
								<td><h4>Late Entries</h4></td>
							</thead>

							<tbody>
								<?php
								$serial=1;
								?>
								@foreach ($entries as $entry)
									
									{{$info = DB::table('Students_infos')->where('student_id', $entry['student_id'])->first();}}
									{{$passInfo = array('student_id' =>$info->student_id,
										'student_name'=>$info->student_name,
										'branch'=>$info->branch,
										'year'=>$info->year,
										'entry_date' => $entry->entry_time);}}
									
									@if ($passInfo['branch']==$branch) 
										{{"<tr><td>" . $serial . "</td><td>" . $passInfo['student_id'] . "</td><td>" . $passInfo['student_name'] . "</td><td>" . $passInfo['branch'] . "</td><td>" . $passInfo['year'] . "</td><td>" . $passInfo['entry_date'] . "</td></tr>"}}
										<?php $serial++; ?>
									@endif
									@if ($branch=='0')
										{{"<tr><td>" . $serial . "</td><td>" . $passInfo['student_id'] . "</td><td>" . $passInfo['student_name'] . "</td><td>" . $passInfo['branch'] . "</td><td>" . $passInfo['year'] . "</td><td>" . $passInfo['entry_date'] . "</td></tr>"}}
										<?php $serial++; ?>
									@endif
								
								@endforeach
								
								
							</tbody>
						</table>
					</div>	
				</div>
			</div>

			
			<!-- footer -->
			<div class="footer row">
				<h4 class="text-center">&copy;<strong>SOFTWARE INCUBATOR</strong></h4>
			</div>
		</div>	
		

		<!-- javascript			 -->

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

		<!-- jquery -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<!-- bootstrap -->	
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</body>
	</html>