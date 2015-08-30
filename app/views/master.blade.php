<html>
<head>
	<title>

		@yield('title')
	
	</title>

	<!-- CSS Files Links -->
	<!-- Main Page -->
	{{ HTML::style('css/mainpage.css') }}
	<!-- Clock Files-->
	{{ HTML::style('css/flipclock.css') }}
	<!-- Bootstrap CDN -->
	{{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css') }}
	<!-- Inside CSS -->
	{{ HTML::style('css/inside.css') }}
	<!-- Clock1 CSS-->
	{{ HTML::style('css/clock1.css') }}

    {{HTML::style('css/datepicker.css')}}
    {{HTML::style('css/datepicker3.css')}}
	<!-- Register CSS -->
	{{ HTML::style('css/register.css') }}
	<!-- New Entry CSS -->
	{{ HTML::style('css/new_entry.css') }}
    <!-- Report CSS -->
    {{ HTML::style('css/report.css') }}
    <!-- fontawesome CDN -->
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') }}

<!-- <link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'> -->
    {{ HTML::style('http://fonts.googleapis.com/css?family=Economica') }}


	<!-- Scripts -->            
	<!-- JQuery -->
	{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}
	<!-- FlipClock JS -->
	{{ HTML::script('js/flipclock.js') }}
	<!-- Bootstrap.min JS -->
	{{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js') }}
    <!-- Shake Script -->
    {{ HTML::script('js/jquery.ui.shake.js')}}
    
    <!--Yield Validation Scripts -->
    <script type ='text/javascript'>
    @yield('validations')
    </script>

</head>
<body>

	<!-- Super Container -->
	<div class="container-fluid">
		<!-- Header -->
		<div class="header row">
            <!-- Empty -->
			<div class="col-md-2 col-sm-1">
                <!-- Home Button -->
                <div class="home">
                    <a href="dashboard"><span class="fa fa-home fa-3x"></span></a>
                </div>
			</div>
			<!-- College Name Heading -->
			<h1 class="text-center center col-md-7 col-sm-8">AKGEC LATE ENTRY SYSTEM</h1>
            
			<!-- Logout Button -->
			{{ Form::open(['route' => 'logout_submit']) }}
			<!-- Empty -->
			<div class="col-md-1 col-sm-1">
			</div>

			<!-- Yield Logout Button -->

			@yield('logout_button')  

			{{ Form::close() }}
			<!-- Empty -->
            <div class="col-md-1 col-sm-1">
            </div>   
        </div>
        <!-- Middle Content -->
        <div class="wrapper row block">

        	<!-- Yield Message -->
        	@if( Session::has('message'))
        	<div class="alert alert-info">
    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>
        			{{ Session::get('message') }}
    			</strong> 
  			</div>
        	@endif

        	<!-- Yield Flipclock -->

        	@yield('flipclock')

        	<!-- Yield Mid Content -->

        	@yield('mid_content')

        	<!-- Yield Report Buttons -->

        	@yield('report_buttons')

        	<!-- Yield Modal -->

        	@yield('modal')


        </div>
        <!-- Footer -->
        <div class="footer row">
            <h4 class="text-center"><img id="si_logo" src="images/si_logo.png" height="48" width="50">&copy;<strong>SOFTWARE INCUBATOR</strong></h4>
        </div>                  
    </div>

    <!-- JavaScript for FlipClock-->
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        var clock;
        $(document).ready(function() 
        {
        	clock = $('.clock').FlipClock({
        	clockFace: 'TwelveHourClock'
        	});
        });
        //Disable Scroll
        if(window.addEventListener)
        {
            	window.addEventListener('DOMMouseScroll',wheel,false);
        }
        function wheel(event)
        {
            event.preventDefault();
            event.returnValue=false;
        }
        window.onmousewheel=document.onmousewheel=wheel;
        //Date Time Picker
        $(function () 
        {
        	// $('#datetimepicker10').datetimepicker({
         //    viewMode: 'years',
         //    format: 'MM/YYYY'
         //    });

                $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d'
})
        }); 
    </script>         

</body>
</html>