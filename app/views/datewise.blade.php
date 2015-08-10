<html>
<head>
    <title>Late Entry | Datewise</title>      
    
    <!-- css file -->

    <!-- mainpage -->
    {{HTML::style('css/mainpage.css')}}
    <!-- clock files-->
    {{HTML::style('css/flipclock.css')}}
    <!-- bootstrapcdn -->
    {{HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css')}}
    <!-- inside css -->
    {{HTML::style('css/inside.css')}}
    <!-- clock1 css-->
    {{HTML::style('css/clock1.css')}}

    <!-- scripts -->            

    {{HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js')}}
    {{HTML::script('js/flipclock.js')}}
    {{HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js')}}
    
    
</head>

<body>
    <div class="container-fluid">
        <!-- header -->
        <div class="header row">
            <div class="col-md-2 col-sm-1"></div>
            <h1 class="text-center center col-md-7 col-sm-8">AKGEC LATE ENTRY SYSTEM</h1>
            <!-- empty -->
            {{ Form::open(['route' => 'logout_submit']) }}
            <div class="col-md-1 col-sm-1"></div>
            <!-- logout button at top -->
            

            <!-- {!!Form::submit('Logout', array('class' => 'btn btn-default col-md-1 col-sm-1 logout')  ) !!} -->

            
            <button class="btn btn-default col-md-1 col-sm-1 logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                <span> Logout</span>
                <!-- empty -->
                {{ Form::close() }}
            <!-- back button at top -->
            <!-- {{ Form::open(['route' => 'back_button']) }}
            {{ Form::submit('Back To Today', array('class' => 'btn btn-warning', 'id' => 'backButton')  ) }}
            {{ Form::close() }} -->

                <!-- <button class="btn btn-default col-md-1 col-sm-1 logout">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    <span> Logout</span>
                </button> -->
                <!-- empty -->
                <div class="col-md-1 col-sm-1"></div>   
                
            </div>

            <!-- content middle-->
            <div class="wrapper row block">
                
                <div class="container">
                    <!-- clock -->
                    <div class="row clock col-md-offset-3">
                    </div>


                    <!-- button field / input group -->
                    {{ Form::open(['route' => 'datewise_info']) }}
                    <div class="row">   
                        <div class="col-md-6 col-md-offset-3 fhieght">
                            <div class="input-group">

                              

                                {{ Form::text('studentNumber', null , array('class' => 'form-control', 'placeholder' => 'Enter the Student Number' ) ) }}
                                <span class="input-group-btn">
                                    <!-- <button class="btn btn-warning" type="button">Search</button> -->
                                    {{ Form::submit('Search', array('class' => 'btn btn-warning', 'id' => 'submitButton')  ) }}

                                </span>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->    
                    {{ Form::close() }}
                    <!-- or -->
                    <div class="or">
                        
                     SIMULATED DATE : <strong><?php echo $Session['entry_date']; ?></strong> &nbsp  OR SIMULATE NEW DATE 
                 </div>
                 <!-- date time picker -->
                 {{  Form::open(['route' => 'date_change_submit']) }}
                 
                 <div class="row fheight1">
                    <div class="col-md-6 col-md-offset-3 bottom_pad" style="height:100px;">
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker10'>
                                <!-- <input type='text' class="form-control" placeholder="Enter date for a datewise entry"/> -->
                                {{ Form::input('date', 'entryDate', null, ['class' => 'form-control']) }}

                                <span class="input-group-btn">
                                    {{ Form::submit('Simulate Again', array('class' => 'btn btn-warning', 'id' => 'datewiseEntry'))}}
                                </span>
                            </div>
                        </div>  
                    </div>
                </div>  
                {{ Form::close() }}
                <!-- buttons -->
                <div class="buttons col-md-offset-2 row">
               <a href="#modal2" data-toggle="modal" style="text-decoration:none">
                <button class="btn-lg btn-default bt_style col-md-3 col-sm-4">Daily Report</button>
            </a>

            <!-- <button class="btn-lg btn-default bt_style col-md-3 col-sm-4">Daily Records Report</button> -->

            <!-- {!!Form::submit('Daily Report', array('class'=>'btn-lg btn-default bt_style col-md-3 col-sm-4', 'id'=>'dailyButton')) !!} -->
            <!-- {!!Form::close() !!} -->
            {{  Form::open(['route' => 'report_submit']) }}
            <div class="col-md-1 col-sm-1"></div>
            <!-- <button class="btn-lg btn-default bt_style col-md-3 col-sm-4">Some Records Report</button> -->
            {{ Form::submit('Generate Reports', array('class' => 'btn-lg btn-default bt_style col-md-3 col-sm-4', 'id' => 'reportButton')  ) }}

        </div>
        {{ Form::close() }}
            </div>  
        </div>
        
        <div class="footer row">
            <h4 class="text-center">&copy;<strong>SOFTWARE INCUBATOR</strong></h4>
        </div>                  
    </div>  
    <!-- modal -->
<div class="modal fade md" id="modal2" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Welcome</h3>
                    </div>
                        {{ Form::open(['route' => 'daily_report']) }}
                    <div class="modal-body">
                        <!-- calendar -->
                            <h4 class="text-center hfour">Record of Date</h4>                         
                                <div >
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker9'>
                                           <!--  <input type='text' class="form-control pd" /> -->

                                           {{ Form::input('date', 'reportDate', date('Y-m-d'), ['class' => 'form-control']) }}
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- branch input starts here -->
                            <div>
                            <h4 class="text-center hfour">Branch(es)</h4>                           
                             
                                    
                                    <!-- <div class="input-group-btn"> -->
                                        <!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Branch<span class="  caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                          <li><a href="#">Civil</a></li>
                                          <li><a href="#">CSE</a></li>
                                          <li><a href="#">ECE</a></li>
                                          <li><a href="#">EI</a></li>
                                          <li><a href="#">EN</a></li>
                                          <li><a href="#">M.C.A</a></li>
                                          <li><a href="#">Mechanical</a></li>                                     
                                        </ul> -->
                                        
                                        {{ Form::select('branch', ['ALL', 'CS', 'IT', 'EC', 'EN', 'EI', 'CE', 'ME', 'MCA', 'MBA'],['class' => 'form-control']) }}
                                   
                                
                            </div><!-- /.col-lg-6 -->                           
                    </div>  

                    <div class="modal-footer">
                        <!-- <button class="btn btn-warning" data-dismiss="modal">Submit</button> -->
                        {{ Form::submit('Get Report', array('class' => 'btn btn-warning', 'id' => 'report_Button')  ) }}
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}


    <!-- javascript -->

    <script type="text/javascript">
    var clock;

    $(document).ready(function() {
        clock = $('.clock').FlipClock({
            clockFace: 'TwelveHourClock'
        });
    });

            // disable scroll
            if(window.addEventListener){
                window.addEventListener('DOMMouseScroll',wheel,false);
            }

            function wheel(event)
            {
                event.preventDefault();
                event.returnValue=false;
            }
            window.onmousewheel=document.onmousewheel=wheel;


            // date time picker

            $(function () {
                $('#datetimepicker10').datetimepicker({
                    viewMode: 'years',
                    format: 'MM/YYYY'
                });
            }); 
            </script>         
          
        </body>
        </html>