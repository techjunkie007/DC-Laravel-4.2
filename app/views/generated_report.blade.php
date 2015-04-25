<?php
 header("Content-type: application/vnd.ms-word");
 header("Content-Disposition: attachment;Filename=document_name.doc");
?>

<html>
    <head></head>
    <body>
        <h2 style="margin-left:100px; margin-top:25px;">Overall late entry report</h2>
        <div id="table" >
           <table border="1"  style="border-collapse:collapse; margin-left:100px; margin-top:70px; width:600px; text-align:center;">
            <tr>
                <th>SNO</th>
		<th>Student Number</th>
                <th>Name of student</th>
                <th>Branch </th>
                <th>Year</th>
                <th>Late Entries</th>
            </tr>
            
            
            
           

<?php
    include 'includes/connection.php';

    if(isset($_POST['start']))    
    $start=$_POST['start'];
    else $start=1;

    if(isset($_POST['end']))    
    $end=$_POST['end'];
    else $end=10;

    if(isset($_POST['branch']))    
    $branch=$_POST['branch'];
    else $branch='all';
    
     $query="SELECT * FROM datewise INNER JOIN data ON data.st_no=datewise.st_no WHERE late_count BETWEEN ".$start." AND ".$end;
     $sql="";

    if($branch=="all")
    {
        
    // $sql=$query." GROUP BY data.st_no ";     
    $sql=$query." GROUP BY data.st_no ";     

    }
    else
    {
    
    // $sql=$query." WHERE branch='".$branch."' GROUP BY data.st_no ";
        $sql=$query." AND branch='".$branch."' GROUP BY data.st_no ";
           
    }
    // var_dump($start);
    
    $query_select=mysqli_query($con,$sql);
    // $query_result=mysqli_fetch_array($query_select,MYSQLI_ASSOC);
    // var_dump($query_result);
    // $query= 'SELECT st_no,name,branch,late_count,year FROM data WHERE late_count>='.$start.' AND late_count<='.$end;
    // $query_select= mysqli_query($con,$query);
	$i=1;
    while($query_result= mysqli_fetch_array($query_select,MYSQLI_ASSOC))
          {
            // var_dump($query_result);
               echo '<tr>';
		echo '<td>';
		echo $i; $i=$i+1;
		echo '</td>';
                echo '<td>';
                echo $query_result['st_no'];
                echo '</td>';
                echo '<td>';
                echo $query_result['name'];
                echo '</td>';
                echo '<td>';
                echo $query_result['branch'];
                echo '</td>';
                echo '<td>';
                echo $query_result['year'];
                echo '</td>';
                echo '<td>';
                echo $query_result['late_count'];
                echo '</td>';          
                echo '</tr>';
        
                
                //
                
            }
        
            

?>
 </table> 
</div>