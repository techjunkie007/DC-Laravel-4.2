<!-- Extends Master -->
@extends('master')

<!-- Yield Page Header Title-->
@section('title', 'Late Entry | Daily Report')

<!-- Yield Validations -->
@section('validations')

function validateReportDates() 
{
    var from = document.getElementById('reportFromDate');
    var to = document.getElementById('reportToDate');
    if( from.value == "" || from.value== null || to.value== "" || to.value== null)
    {
        alert("Date Fields can't be empty");
        return false;
    }
    if( from.value > to.value)
    {
        alert("From Date should be less than To Date");
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
    <!-- Logout Form Close -->
    {{ Form::close() }}

@endsection

@section('mid_content')
    
    <!-- Three Entry Form Open -->
    {{Form::open(['url' => 'three-entry-report']) }}
    <div class="wrapper row block">
        <div class="generate_buttons col-md-8 col-md-offset-2"> 
            <!-- Three Entry Report Button -->
            <button class="btn btn-default generate">
                <h3>Three Late Entry Report Generation</h3>
            </button>
            <!-- Three Entry Form Close -->
            {{Form::close() }}
            <!-- Range Report Button Triggered Modal -->
            <a class="anchor" href="#modal1" data-toggle="modal" style="text-decoration:none;"> 
            <button class="btn btn-default btn-primary-bg generate" >
                <h3>Range Report Generation</h3>
            </button>
            </a>                    
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
                    <center><h3>Range Report Panel</h3></center>
                </div>
                <!-- Generate Report Form Open -->
                {{  Form::open(['url' => 'range-report']) }}
                <!-- Modal Body -->
                <div class="modal-body">
                    <h4 class="text-center hfour">Record From Date</h4>                         
                    <div>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker9'>
                                <!-- From Date Field -->
                                {{ Form::input('date', 'reportFromDate', null, ['id' => 'reportFromDate', 'class' => 'form-control']) }}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                                </span>
                           </div>
                       </div>
                    </div>
                    <h4 class="text-center hfour">To Date</h4>                         
                    <div>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker9'>
                            <!-- To Date Field -->
                            {{ Form::input('date', 'reportToDate', null, ['id' => 'reportToDate', 'class' => 'form-control']) }}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-center hfour">Branch(es)</h4>   
                        <!-- Branch Picker -->
                        {{ Form::select('branch', ['ALL', 'CS', 'IT', 'EC', 'EN', 'EI', 'CE', 'ME', 'MCA', 'MBA'],['class' => 'form-control']) }}
                    </div>                           
                </div>  
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <!-- Get Range Report Submit Button -->
                    {{Form::submit('Get Range Report', array('onClick' => 'return validateReportDates()', 'class' => 'btn btn-warning', 'id' => 'report_Button')  ) }}
                </div>
            </div>
        </div>
    </div>
    <!-- Generate Range Report Form Close -->
    {{ Form::close() }}

@endsection