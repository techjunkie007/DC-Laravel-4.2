<html>
<head>
    <title>Late Entry | Report</title>
    
    <!-- bootstrapcdn -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- css file -->
    <link rel="stylesheet" type="text/css" href="../public/css/inside.css">
    <!-- css file -->
    <link rel="stylesheet" type="text/css" href="../public/css/mainpage.css">     
</head>

<body>
    <div class="container-fluid">
        <!-- header -->
        <div class="header row">
            <div class="col-md-2 col-sm-1"></div>
            <h1 class="text-center center col-md-7 col-sm-8">AKGEC LATE ENTRY SYSTEM</h1>
            <!-- empty -->
            {{Form::open(['route' => 'logout_submit']) }}
            <div class="col-md-1 col-sm-1"></div>
            <!-- logout button at top -->
            

            <!-- {!!Form::submit('Logout', array('class' => 'btn btn-default col-md-1 col-sm-1 logout')  ) !!} -->

            
            <button class="btn btn-default col-md-1 col-sm-1 logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                <span> Logout</span>
                <!-- empty -->
                {{Form::close() }}

            <!-- empty -->
            <div class="col-md-1 col-sm-1"></div>               
        </div>
        {{Form::open(['route' => 'generate_three_entry_report']) }}

        <div class="wrapper row block">
            <div class="generate_buttons col-md-8 col-md-offset-2"> 
                <button class="btn btn-default generate">
                    <h3>Generate document for students with 3 late entries</h3>
                </button>
               <!-- {!!Form::submit('Generate document for students with 3 late entries', array('class' => 'btn btn-default generate', 'id' => 'report_Button')  ) !!} -->
                    {{Form::close() }}

                <!-- Button trigger modal -->
                <a class="anchor" href="#modal1" data-toggle="modal" style="text-decoration:none;"> 
                    <button class="btn btn-default generate" >
                        <h3>Generate document for students for a certain period</h3>
                    </button>
                </a>                    
            </div>  
        </div>

        
        <!-- footer -->
        <div class="footer row">
            <h4 class="text-center">&copy;<strong>SOFTWARE INCUBATOR</strong></h4>
        </div>
    </div>  
    <!-- modal -->

    <div class="modal fade md" id="modal1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h3>Range Report Panel</h3></center>
                </div>
                {{  Form::open(['route' => 'generate_report']) }}
                <div class="modal-body">
                    <!-- calendar -->
                    <h4 class="text-center hfour">Record From Date</h4>                         
                    <div >
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker9'>
                               <!--  <input type='text' class="form-control pd" /> -->

                               {{ Form::input('date', 'reportFromDate', null, ['class' => 'form-control']) }}
                               <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                           </div>
                       </div>
                   </div>
                   <h4 class="text-center hfour">To Date</h4>                         
                   <div >
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker9'>
                           <!--  <input type='text' class="form-control pd" /> -->

                           {{ Form::input('date', 'reportToDate', null, ['class' => 'form-control']) }}
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
            <!-- <button class="btn btn-warning" data-dismiss="modal">Submit</button> -->
            {{Form::submit('Get Range Report', array('class' => 'btn btn-warning', 'id' => 'report_Button')  ) }}
        </div>
    </div>
</div>
</div>
{{ Form::close() }}



<!-- javascript          -->

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<!-- jquery -->
<script type="text/javascript" src="../public/js/jquery.js"></script>
<!-- bootstrap --> 
<script type="text/javascript" src="../public/js/bootstrap.js"></script>


<script type="text/javascript">
        // calendar access
        $('#datetimepicker6').data("DateTimePicker").FUNCTION()

             //calendar script

             $(function () {
                $('#datetimepicker9').datetimepicker({
                    viewMode: 'years'
                });
            });

                //calendar script 2

                $(function () {
                    $('#datetimepicker2').datetimepicker({
                        locale: 'ru'
                    });
                });


                </script>
            </body>
            </html>