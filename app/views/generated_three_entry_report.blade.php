<?php
//Header Files for MS-Word
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=LateEntries.doc");
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
            <center><h2 class="cl-md-offset-1 tb"> Students with 3 Late Entries </h2></center>
            @if( $entries )
            <div class="overflo">
                <table class="table" style="width:100%">
                    <thead>
                        <td><h4>S.No.</h4></td>
                        <td><h4>Student No.</h4></td>
                        <td><h4>Name</h4></td>
                        <td><h4>Branch</h4></td>
                        <td><h4>Year</h4></td>
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
                                            'year'=>$info->year);
                            
                            echo "<tr><td>" . $serial . "</td><td>" . $passInfo['student_id'] . "</td><td>" . $passInfo['student_name'] . "</td><td>" . $passInfo['branch'] . "</td><td>" . $passInfo['year'] . "</td></tr>";
                            $serial++;
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
       