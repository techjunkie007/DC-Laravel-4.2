<!-- Extends Master -->
@extends('master')

<!-- Yield Page Header Title-->
@section('title', 'Late Entry | Range Report')

<!-- Yield Logout Button -->
@section('logout_button')

    <!-- Logout Form Open -->
    {{ Form::open(['route' => 'logout_submit']) }}
    <!-- Logout Button -->
    <button class="btn btn-default col-md-1 col-sm-1 logout">
    <span class="glyphicon glyphicon-off" aria-hidden="true">
    </span>
    <span> Logout</span>
    <!-- Logout Form Close -->
    {{ Form::close() }}

@endsection

@section('mid_content')

    <div class="container block">
        <div class="row Heading">
            @if($branch=='0')
            <?php $branch="All" ?> 
            @endif
            <h2 class="cl-md-offset-1 tb">Late Comers from {{$fromDate}} to {{$toDate}} :</h2>
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
                        <td><h4>Late Entries</h4></td>
                    </thead>
                   <tbody>


 <?php
 /*
            $serial=1;
            foreach ($entries as $entry) {


                
                
                $info = \DB::table('Students_infos')->where('student_id', $entry->student_id)->first();
                $passInfo = array('student_id' =>$info->student_id ,
                    'student_name'=>$info->student_name,
                    'branch'=>$info->branch,
                    'year'=>$info->year,
                    'entry_time'=>$entry->entry_time);
                
                if ($passInfo['branch']==$branch) {
                echo "<tr><td>" . $serial . "</td><td>" . $passInfo['student_id'] . "</td><td>" . $passInfo['student_name'] . "</td><td>" . $passInfo['branch'] . "</td><td>" . $passInfo['year'] . "</td><td>" . $passInfo['entry_time'] . "</td></tr>";
                $serial++;
            }
            elseif ($branch=='0') {
                
                echo "<tr><td>" . $serial . "</td><td>" . $passInfo['student_id'] . "</td><td>" . $passInfo['student_name'] . "</td><td>" . $passInfo['branch'] . "</td><td>" . $passInfo['year'] . "</td><td>" . $passInfo['entry_time'] . "</td></tr>";;
                $serial++;
            }
                
            } */
            
            ?>


                    </tbody>
                </table>
            </div>  
        </div>
    </div>

@endsection