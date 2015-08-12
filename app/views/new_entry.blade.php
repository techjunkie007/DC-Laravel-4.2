<!-- Extends Master -->
@extends('master')

<!-- Yield Page Header Title-->
@section('title', 'Late Entry | Today\'s Entry')

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

<!-- Yield Mid-Content -->
@section('mid_content')

    <div class="container block1">
        <div class="row InformationBox">
            <div class="col-md-3 col-sm-4 thumbnail">
            <!-- Thumbnail of Student -->
            <?php 
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
                <h3>Enter Particulars</h3>
            </div>
            <!-- Add New Student Form Open -->
            {{ Form::open(['route' => 'details_submit']) }}
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="input-group pd">
                    <span class="input-group-addon" id="basic-addon1">Name</span>
                    <!-- Student Name Field -->
                    {{ Form::text('studentName', null , array('class' => 'form-control', 'placeholder' => 'Enter Name' ) ) }}
                </div>                                                                                         
                <div class="input-group pd">
                    <span class="input-group-addon" id="basic-addon1">Branch</span>
                    <!-- Branch Field -->
                    {{ Form::text('studentBranch', null , array('class' => 'form-control', 'placeholder' => 'Enter Branch' ) ) }}
                </div>
                <div class="input-group pd">
                    <span class="input-group-addon" id="basic-addon1">Student No.</span>
                    <!-- Student Number Field Autofilled -->
                    {{ Form::text('studentNumber', $Session['student_no'] , array('class' => 'form-control' ) ) }}
                </div>
                <div class="input-group pd1">
                    <span class="input-group-addon" id="basic-addon1">Year</span>
                    <!-- Year Field -->
                    {{ Form::text('studentYear', null, array('class' => 'form-control' , 'placeholder' => 'Enter Year') ) }}
                </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <!-- Add Student Button -->
                    {{ Form::submit('Add This Student', array('class' => 'btn btn-warning')  ) }}
                </div>
            </div>
        </div>
    </div>
    <!-- Add New Student Form Close -->
    {{ Form::close() }}
@endsection








