<!-- Extends Master -->
@extends('master')

<!-- Yield Page Header Title-->
@section('title', 'Late Entry | New Student Entry')

<!-- Yield Validations -->
@section('validations')

function validateAddStudentForm() 
{
    var name = document.getElementById('studentName');
    var branch = document.getElementById('studentBranch');
    var year = document.getElementById('studentYear');
    var number = document.getElementById('studentNumber');

    if( name.value == "" || name.value== null || branch.value == "" || branch.value== null ||
        year.value == "" || year.value== null || number.value == "" || number.value== null)
    {
        alert("Any of the Fields can't be empty");
        return false;
    }
    else if( name.value.search(/[^A-Za-z\s]/) != -1 )
    {
        alert("Name should have Alphabets only");
        return false;
    }
    else if( !(branch.value == "CS" || branch.value == "IT" || branch.value == "EC" || branch.value == "EN" || branch.value == "CE" || branch.value == "MCA" || branch.value == "MBA" || branch.value == "ME" || branch.value == "EI") ) 
    {   
        alert("Branch should be in CS IT EC EN EI CE ME MCA MBA");
        return false;
    }
    else if( isNaN(number.value) )
    {   
        alert("Student Number is supposed to be a number");
        return false;
    }
    else if(number.value.length != '7')
    {
        alert("Student Number should have only 7 digits");
        return false;    
    }
    else if( isNaN(year.value) )
    {   
        alert("Year is supposed to be a number");
        return false;
    }
    else if( !(year.value == '1' || year.value == '2' || year.value == '3' || year.value == '4') )
    {
        alert("Year is Invalid");
        return false;    
    }

    else
    {
        return true;
    }
}

@endsection

<!-- Yield Logout Button -->
@section('logout_button')

    <!-- Logout Button -->
    <button class="btn btn-default col-md-1 col-sm-1 logout">
    <span class="glyphicon glyphicon-off" aria-hidden="true">
    </span>
    <span> Logout</span>

@endsection

<!-- Yield Mid-Content -->
@section('mid_content')

    <div class="container block1">
        <div class="row InformationBox">
            <div class="col-md-3 col-sm-4 thumbnail">
            <!-- Thumbnail of Student -->
            <?php 
            $Session= Session::all();
            $image_path="images/".$Session['student_no'].".jpg";
            echo "<img src=".$image_path.">";
            ?>
            </div>
            <!-- Empty -->
            <div class="col-md-1 col-sm-1">
            </div>
            <div class="col-md-8 col-sm-8 Info">
                <ul>
                <li class=" row Name">Error 404 </li><hr>
                <li class="row St_no">
                    <a href="#modal1" data-toggle="modal" style="text-decoration:none;">
                        <button class="btn btn-warning">Add New Student</button>
                    </a>
                </li>
                <li class="row Branch">Student Number <?php echo $Session['student_no']; ?> Not Found</li>
                <li class="row Text">Click on Add New Student to make fresh entry.</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('modal')

<div class="modal fade md" id="modal1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Enter Particulars</h3>
            </div>
            <!-- Add New Student Form Open -->
            {{ Form::open(['url' => 'new-student', 'method' => 'GET']) }}
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="input-group pd">
                    <span class="input-group-addon" id="basic-addon1">Name</span>
                    <!-- Student Name Field -->
                    {{ Form::text('studentName', null , array('id'=>'studentName','class' => 'form-control', 'placeholder' => 'Enter Name' ) ) }}
                </div>                                                                                         
                <div class="input-group pd">
                    <span class="input-group-addon" id="basic-addon1">Branch</span>
                    <!-- Branch Field -->
                    {{ Form::text('studentBranch', null , array('id'=>'studentBranch','class' => 'form-control', 'placeholder' => 'Enter Branch' ) ) }}
                </div>
                <div class="input-group pd">
                    <span class="input-group-addon" id="basic-addon1">Student No.</span>
                    <!-- Student Number Field Autofilled -->
                    {{ Form::text('studentNumber', $Session['student_no'] , array('id'=>'studentNumber','class' => 'form-control' ) ) }}
                </div>
                <div class="input-group pd1">
                    <span class="input-group-addon" id="basic-addon1">Year</span>
                    <!-- Year Field -->
                    {{ Form::text('studentYear', null, array('id'=>'studentYear','class' => 'form-control' , 'placeholder' => 'Enter Year') ) }}
                </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <!-- Add Student Button -->
                    {{ Form::submit('Add This Student', array('onClick'=>'return validateAddStudentForm()','class' => 'btn btn-warning')  ) }}
                </div>
            </div>
        </div>
    </div>
    <!-- Add New Student Form Close -->
    {{ Form::close() }}
@endsection








