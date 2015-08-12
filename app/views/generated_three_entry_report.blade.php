<?php
 header("Content-type: application/vnd.ms-word");
 header("Content-Disposition: attachment;Filename=.doc");
?>

<html>
    <head></head>
    <body>

<div class="container-fluid">
        <!-- header -->
        
        
        <div class="container block">
            <div class="row Heading">
                <h2 class="cl-md-offset-1 tb">Late Comers With 3 Late Entries at Present</h2>
                <div class="overflo">
                    <table class="table">
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
            foreach ($entries as $entry) {


                
                
                $info = DB::table('Students_infos')->where('student_id', $entry->student_id)->first();
                $passInfo = array('student_id' =>$info->student_id ,
                    'student_name'=>$info->student_name,
                    'branch'=>$info->branch,
                    'year'=>$info->year);
                
                
                
                echo "<tr><td>" . $serial . "</td><td>" . $passInfo['student_id'] . "</td><td>" . $passInfo['student_name'] . "</td><td>" . $passInfo['branch'] . "</td><td>" . $passInfo['year'] . "</td></tr>";;
                $serial++;
                
            }
            
            ?>
                        
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
    

    

    </body>
</html>
       