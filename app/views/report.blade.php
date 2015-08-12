<!-- Extends Master -->
@extends('master')

<!-- Yield Page Header Title-->
@section('title', 'Late Entry | Daily Report')

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

@section('mid_content')
    
    <!-- Three Entry Form Open -->
    {{Form::open(['route' => 'generate_three_entry_report']) }}
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
            <button class="btn btn-default generate" >
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
                    <center><h3>Range Report Panel</h3></center>
                </div>
                <!-- Generate Report Form Open -->
                {{  Form::open(['route' => 'generate_report']) }}
                <!-- Modal Body -->
                <div class="modal-body">
                    <h4 class="text-center hfour">Record From Date</h4>                         
                    <div>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker9'>
                                <!-- From Date Field -->
                                {{ Form::input('date', 'reportFromDate', null, ['class' => 'form-control']) }}
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
                            {{ Form::input('date', 'reportToDate', null, ['class' => 'form-control']) }}
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
                    {{Form::submit('Get Range Report', array('class' => 'btn btn-warning', 'id' => 'report_Button')  ) }}
                </div>
            </div>
        </div>
    </div>
    <!-- Generate Range Report Form Close -->
    {{ Form::close() }}

@endsection