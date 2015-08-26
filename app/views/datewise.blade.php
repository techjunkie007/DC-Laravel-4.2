<!-- Extends Master -->
@extends('master')

<!-- Yield Page Header Title-->
@section('title', 'Late Entry | Datewise')

<!-- Yield Validations -->
@section('validations')

function validateStudentForm() 
{
    var number = document.getElementById('studentNumber');
    if( number.value == "" || number.value== null)
    {
        alert("Student Number Field can't be empty");
        return false;
    }
    else if( isNaN(number.value) )
    {   
        alert("Student Number is supposed to be a number");
        return false;
    }
    else if( number.value.length != '7')
    {   
        alert("Student Number should be of 7 digits");
        return false;
    }
    else
    {
        return true;
    }
}

function validateDateForm()
{
    var date = document.getElementById('entryDate');
    if( date.value == "" || date.value== null)
    {
        alert("Date Field can't be empty");
        return false;
    }

}

function validateReportDate()
{
    var reportDate = document.getElementById('reportDate');
    if( reportDate.value == "" || reportDate.value== null)
    {
        alert("Date for Daily Report Field can't be empty");
        return false;
    }
    else
    {
        return true;
    }
}

@endsection

<!-- Yield Back Button -->
@section('back_button')
    {{Form::open(['url' => 'dashboard'])}}
    <div>
        <button class="btn btn-default col-md-1 col-sm-1 col-md-offset-1 col-sm-offset-1 logout">
            <span class="glyphicon glyphicon-hand-left glyph_pad" aria-hidden="true"></span>
            <span> Back to Today</span>
        </button>
        {{Form::close()}}
    </div>
@endsection

<!-- Yield Logout Button -->
@section('logout_button')

    <!-- Logout Button -->
    <button class="btn btn-default col-md-1 col-sm-1 logout">
    <span class="glyphicon glyphicon-off" aria-hidden="true">
    </span>
    <span> Logout</span>
    <!-- Logout Form Close -->
    {{ Form::close() }}

@endsection

<!-- Yield FlipClock -->
@section('flipclock')

    <!-- FlipClock -->
    <div class="row clock col-md-offset-2">
    </div>

@endsection

<!-- Yield Mid-Content -->
@section('mid_content')
    <!-- Datewise Form Open -->
    {{ Form::open(['url' => 'student']) }}
    <div class="row">   
        <div class="col-md-6 col-md-offset-3 fhieght">
            <div class="input-group">
                <!-- Student Number Entry -->
                {{ Form::text('studentNumber', null , array('id'=>'studentNumber' ,'class' => 'form-control', 'placeholder' => 'Enter the Student Number' ) ) }}
                <span class="input-group-btn">
                    <!-- Submit Button -->
                    {{ Form::submit('Search', array('onClick'=>'return validateStudentForm()' ,'class' => 'btn btn-warning', 'id' => 'submitButton')  ) }}
                </span>
            </div>
        </div>
    </div>    
    <!-- Datewise Form Close -->
    {{ Form::close() }}
    <!-- OR -->
    <div class="or">
        SIMULATED DATE : 
        <strong>
            {{ Session::get('entry_date') }}
        </strong>
        &nbsp  
        OR SIMULATE NEW DATE 
    </div>
    <!-- New Date Simulation Form Open-->
    {{  Form::open(['url' => 'datewise-dashboard']) }}
    <div class="row fheight1">
        <div class="col-md-6 col-md-offset-3 bottom_pad" style="height:100px;">
            <div class="form-group">
                <div class='input-group date' id='datetimepicker10'>
                    <!-- New Date Entry -->
                    {{ Form::input('date', 'entryDate', null, ['id'=>'entryDate' ,'class' => 'form-control']) }}
                    <span class="input-group-btn">
                        <!-- Simlate Again Button -->
                        {{ Form::submit('Simulate Again', array('onClick'=>'return validateDateForm()' ,'class' => 'btn btn-warning', 'id' => 'datewiseEntry'))}}
                    </span>
                </div>
            </div>  
        </div>
    </div>  
    <!-- Simulate Again Form Close -->
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
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                            {{ Form::input('date', 'reportDate', date('Y-m-d'), ['id'=>'reportDate' ,'class' => 'form-control']) }}
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
                {{Form::submit('Get Daily Report', array('onClick'=>'return validateReportDate()' ,'class' => 'btn btn-warning', 'id' => 'report_Button')  ) }}
                </div>
            </div>
        </div>
    </div>
    <!-- Daily Report Form Close -->
    {{ Form::close() }}
@endsection








