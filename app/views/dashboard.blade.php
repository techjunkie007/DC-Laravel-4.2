<!-- Extends Master -->
@extends('master')

<!-- Yield Page Header Title-->
@section('title', 'Late Entry | Dashboard')

<!-- Yield Logout Button -->
@section('logout_button')

    <!-- Logout Button -->
    <button class="btn btn-default col-md-1 col-sm-1 logout">
    <span class="glyphicon glyphicon-off" aria-hidden="true">
    </span>
    <span> Logout</span>

@endsection

<!-- Yield FlipClock -->
@section('flipclock')

    <!-- FlipClock -->
    <div class="row clock col-md-offset-2">
    </div>

@endsection

<!-- Yield Mid-Content -->
@section('mid_content')

    <!-- Search Student Form Open-->
    {{ Form::open(['url' => 'student']) }}
    <div class="row">   
        <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 fhieght">
            <div class="input-group">
            <!-- Search Box -->
            {{ Form::text('studentNumber', null , array('class' => 'form-control', 'placeholder' => 'Enter the Student Number' ) ) }}
                <!-- Search Button -->
                <span class="input-group-btn">
                {{Form::submit('Search', array('class' => 'btn btn-warning', 'id' => 'submitButton')  ) }}
                </span>
            </div>
        </div>
    </div>  
    <!-- Search Student Form Close -->
    {{ Form::close() }}
    <!-- OR -->
    <div class="or">
    OR MAKE DATEWISE ENTRY
    </div>
    <!-- Datewise Entry Form Open -->
    {{  Form::open(['url' => 'datewise-dashboard']) }}
    <!-- Date Picker -->
    <div class="row fheight1">
        <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 bottom_pad" style="height:100px;">
            <div class="form-group">
                <div class='input-group date' id='datetimepicker10'>
                <!-- Date Entry Box -->
                {{ Form::input('date', 'entryDate', null, ['class' => 'form-control']) }}
                    <span class="input-group-btn">
                    <!-- Simulate Date Button -->
                    {{Form::submit('Simulate', array('class' => 'btn btn-warning', 'id' => 'datewiseEntry'))}}
                    </span>
                </div>
            </div>  
        </div>
    </div>
    <!-- Datewise Entry Form Close -->
    {{ Form::close() }}  
@endsection

<!-- Yield Report Buttons -->
@section('report_buttons')

    <div class="buttons col-md-offset-2 row">
        <!-- Daily Report Button -->
        <a href="#modal1" data-toggle="modal" style="text-decoration:none;">
            <button class="btn-lg btn-default bt_style col-md-3 col-sm-4">Daily Report
            </button>
        </a>
        <!-- Generate Report Form Open -->
        {{  Form::open(['url' => 'report-panel']) }}
        <div class="col-md-1 col-sm-1">
        </div>
        <!-- Generate Report Submit Button -->
        {{Form::submit('Generate Reports', array('class' => 'btn-lg btn-default bt_style col-md-3 col-sm-4', 'id' => 'reportButton')  ) }}
    </div>
    <!-- Generate Report Form Close -->
    {{ Form::close() }}
@endsection

<!-- Yield Modal -->
@section('modal')

    <div class="modal fade md" id="modal1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                     <center> <h3>Daily Records Panel</h3> </center>
                </div>
                <!-- Daily Report Form Open -->
                {{  Form::open(['url' => 'daily-report']) }}
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Calendar -->
                    <h4 class="text-center hfour">Record of Date</h4>                         
                    <div>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker9'>
                            <!-- Date Input -->
                            {{ Form::input('date', 'reportDate', date('Y-m-d'), ['class' => 'form-control']) }}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar">
                                </span>
                            </span>
                            </div>
                       </div>
                    </div>
                    <!-- Branch Input -->
                    <div>
                    <h4 class="text-center hfour">Branch(es)</h4>                           
                    <!-- Branches -->
                    {{ Form::select('branch', ['ALL', 'CS', 'IT', 'EC', 'EN', 'EI', 'CE', 'ME', 'MCA', 'MBA'],['class' => 'form-control']) }}
                    </div>                         
                </div>  
                <!-- Modal Footer -->
                <div class="modal-footer">
                <!-- Get DAily Report Button -->
                {{Form::submit('Get Daily Report', array('class' => 'btn btn-warning', 'id' => 'report_Button')  ) }}
                </div>
            </div>
        </div>
    </div>
    <!-- Daily Report Form Close -->
    {{ Form::close() }}
@endsection








