<?php
//Header Files for MS-Word
$filename= date("d-M-Y",strtotime($from_date)). " to ". date("d-M-Y",strtotime($to_date));
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=". $filename .".doc");
?>
<html>
    <head>
        <!-- Bootstrap CDN -->
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css') }}
    </head>
    <body>
        <div class="container-fluid">
            <div class="container block">
        <div class="row Heading">
            <center><h2 class="cl-md-offset-1 tb">Late Comers from {{date("d-M-Y",strtotime($from_date))}} to {{date("d-M-Y",strtotime($to_date))}} of {{$branch}} Branch(es)</h2></center>
            @if( $entries )
            <div class="overflo">
                <table class="table" style="width:100%">
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
                            echo "<tr><td>" . $serial . "</td><td>" . $passInfo['student_id'] . "</td><td>" . $passInfo['student_name'] . "</td><td>" . $passInfo['branch'] . "</td><td>" . $passInfo['year'] . "</td><td>" . date("d-M-Y",strtotime($passInfo['entry_time'])) . "</td></tr>";
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
        </div>  
    </body>
</html>
       