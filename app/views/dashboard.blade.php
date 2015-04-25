    <html>
    <head>
    <title>Late Entry | Dashboard</title>      

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
       
            <button class="btn btn-default col-md-1 col-sm-1 logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                <span> Logout</span>
                <!-- empty -->
                {{ Form::close() }}
                <div class="col-md-1 col-sm-1"></div>   

            </div>

            <!-- content middle-->

            <div class="wrapper row block">

                <div class="container">
                    
                    <!-- clock -->
                    
                    <div class="row clock col-md-offset-2">
                    </div>

                    <!-- button field / input group -->
                    
                    {{ Form::open(['route' => 'dashboard_info']) }}

                    <div class="row">   
                        <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 fhieght">
                            <div class="input-group">
                                
                                {{ Form::text('studentNumber', null , array('class' => 'form-control', 'placeholder' => 'Enter the Student Number' ) ) }}
                                <span class="input-group-btn">

                                    {{Form::submit('Search', array('class' => 'btn btn-warning', 'id' => 'submitButton')  ) }}
                                </span>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->    
                    {{ Form::close() }}

                    <!-- or -->
                    
                    <div class="or">
                        OR MAKE DATEWISE ENTRY
                    </div>
                    {{  Form::open(['route' => 'date_submit']) }}
                    
                    <!-- date picker -->

                    <div class="row fheight1">
                        <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 bottom_pad" style="height:100px;">
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker10'>
                                    
                                    {{ Form::input('date', 'entryDate', null, ['class' => 'form-control']) }}
                                    <span class="input-group-btn">
                                        {{Form::submit('Simulate', array('class' => 'btn btn-warning', 'id' => 'datewiseEntry'))}}
                                    </span>
                                </div>
                            </div>  
                        </div>
                    </div>
                    {{ Form::close() }}  

                    <!-- Report buttons -->

                    <div class="buttons col-md-offset-2 row">
                        <a href="#modal1" data-toggle="modal" style="text-decoration:none;"><button class="btn-lg btn-default bt_style col-md-3 col-sm-4">Daily Report</button></a>
                        
                        {{  Form::open(['route' => 'report_submit']) }}
                        
                        <div class="col-md-1 col-sm-1"></div>
                        
                        {{Form::submit('Generate Reports', array('class' => 'btn-lg btn-default bt_style col-md-3 col-sm-4', 'id' => 'reportButton')  ) }}
                    </div>
                    {{ Form::close() }}
                </div>  
            </div>

            <div class="footer row">
                <h4 class="text-center">&copy;<strong>SOFTWARE INCUBATOR</strong></h4>
            </div>                  
        </div>  


        <!-- modal -->

        <div class="modal fade md" id="modal1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-header">
                     <center> <h3>Daily Records Panel</h3> </center>
                    </div>
                    
                    {{  Form::open(['route' => 'daily_report']) }}
                 
                    <div class="modal-body">
                    <!-- calendar -->
                    <h4 class="text-center hfour">Record of Date</h4>                         
                    <div >
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker9'>

                               {{ Form::input('date', 'reportDate', date('Y-m-d'), ['class' => 'form-control']) }}

                               <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                           </div>
                       </div>
                   </div>

                   <!-- branch input starts here -->

                   <div>
                    <h4 class="text-center hfour">Branch(es)</h4>                           

                    {{ Form::select('branch', ['ALL', 'CS', 'IT', 'EC', 'EN', 'EI', 'CE', 'ME', 'MCA', 'MBA'],['class' => 'form-control']) }}

                </div><!-- /.col-lg-6 -->                           
            </div>  

            <div class="modal-footer">

                {{Form::submit('Get Daily Report', array('class' => 'btn btn-warning', 'id' => 'report_Button')  ) }}

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