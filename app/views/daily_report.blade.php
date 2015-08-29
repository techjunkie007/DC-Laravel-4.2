<!-- Extends Master -->
@extends('master')

<!-- Yield Page Header Title-->
@section('title', 'Late Entry | Daily Report')

<!-- Yield Logout Button -->
@section('logout_button')

    <!-- Logout Button -->
    <button class="btn btn-default col-md-1 col-sm-1 logout">
    <span class="glyphicon glyphicon-off" aria-hidden="true">
    </span>
    <span> Logout</span>

@endsection

@section('mid_content')

	<div class="container block">
		<div class="row Heading">
			@if($branch=='0')
			<?php $branch="All" ?>
			@endif
            
			<h2 class="cl-md-offset-1 tb">Records Report of Date {{ date("d-M-Y",strtotime($date)) }} for {{$branch}} Branch(es)
            <!-- Print Button -->    
                <a href="download_daily" class="printBtn">
                <span class=" printContainer fa fa-print"  align="right"></span></a> 
            </h2>
			<div class="overflo">
				<!-- Table for Records -->
				<table class="table">
					<!-- Table Head -->
					<thead>
						<!-- Table Headings -->
						<td><h4>S.No.</h4></td>
						<td><h4>Student No.</h4></td>
						<td><h4>Name</h4></td>
						<td><h4>Branch</h4></td>
						<td><h4>Year</h4></td>
					</thead>
					<!-- Table Body -->
					<tbody>

					<?php
                    $serial=1;
                    $emptyFlag= false;
                    foreach ($entries as $entry) 
                    {
                        $info = DB::table('Students_infos')->where('student_id', $entry->student_id)->first();
                        $passInfo = array('student_id' =>$info->student_id ,
                                            'student_name'=>$info->student_name,
                                            'branch'=>$info->branch,
                                            'year'=>$info->year);
                        if($branch!="All" && $passInfo['branch']==$branch)
                        {   
                            $emptyFlag= true;
                            echo "<tr><td>" . $serial . "</td><td>" . $passInfo['student_id'] . "</td><td>" . $passInfo['student_name'] . "</td><td>" . $passInfo['branch'] . "</td><td>" . $passInfo['year'] . "</td></tr>";
                            $serial++;
                        }
                        if($branch=="All")
                        {
                            $emptyFlag=true;
                            echo "<tr><td>" . $serial . "</td><td>" . $passInfo['student_id'] . "</td><td>" . $passInfo['student_name'] . "</td><td>" . $passInfo['branch'] . "</td><td>" . $passInfo['year'] . "</td></tr>";
                            $serial++;   
                        }
                    }
                    if ($emptyFlag== false) 
                    {
                        echo "<center><div class=\"alert alert-danger\" role=\"alert\">No Entries Found in Database</div></center>";
                    }
                    ?>
					
					</tbody>
				</table>
			</div>
            
		</div>
	</div>

@endsection