<!-- Extends Master -->
@extends('master')

<!-- Yield Page Header Title-->
@section('title', 'Late Entry | Range Report')

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
            <h2 class="cl-md-offset-1 tb">Late comers from <strong>{{ date("d F,Y",strtotime($from_date)) }} to {{ date("d F,Y",strtotime($to_date)) }}</strong> for {{$branch}} Branch(es)
                <!-- Print Button -->    
                <a href="download_range" class="printBtn">
                <span class=" printContainer fa fa-print"  align="right"></span></a>

                

            </h2>
            <!-- Second Print button -->
               <h2> <a href="download_distinct" class="printBtn">
                <span class=" printContainer fa fa-print"  align="right"></span></a>
            </h2>
            @if ( $entries )
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
                        <td><h4>Entry Date</h4></td>
                    </thead>
                   <tbody>
                    <?php
                    $serial=1;
                    foreach ($entries as $entry) 
                    {
                        $info = DB::table('Students_infos')->where('student_id', $entry->student_id)->first();
                        $passInfo = array('student_id' =>$info->student_id ,
                                            'student_name'=>$info->student_name,
                                            'branch'=>$info->branch,
                                            'year'=>$info->year,
                                            'entry_time'=>$entry->entry_time);
                        $passInfo['entry_time']= explode(" ", $passInfo['entry_time'])[0];
                        if($branch!="All" && $passInfo['branch']==$branch)
                        {   
                            echo "<tr><td>" . $serial . "</td><td>" . $passInfo['student_id'] . "</td><td>" . $passInfo['student_name'] . "</td><td>" . $passInfo['branch'] . "</td><td>" . $passInfo['year'] . "</td><td>" . date("d-M-Y",strtotime($passInfo['entry_time'])). "</td></tr>";
                            $serial++;
                        }
                        if($branch=="All")
                        {
                            echo "<tr><td>" . $serial . "</td><td>" . $passInfo['student_id'] . "</td><td>" . $passInfo['student_name'] . "</td><td>" . $passInfo['branch'] . "</td><td>" . $passInfo['year'] . "</td><td>" . date("d-M-Y",strtotime($passInfo['entry_time'])) . "</td></tr>";
                            $serial++;   
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div> 
            @else
            <div class="alert alert-danger" role="alert">
                No Entries Found in Database
            </div>
            @endif 
        </div>
    </div>

@endsection