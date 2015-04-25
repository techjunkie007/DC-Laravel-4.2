	<html>
	<head>
		<title>Late Entry | New Entry</title>
		
		<!-- bootstrapcdn -->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<!-- css file -->
		<link rel="stylesheet" type="text/css" href="css/inside.css">
		<!-- css file -->
		<link rel="stylesheet" type="text/css" href="css/mainpage.css">		
		<!-- clock1 css-->
		<link rel="stylesheet" type="text/css" href="css/clock1.css">
		<!-- register css -->
		<link rel="stylesheet" type="text/css" href="css/register.css">
		<!-- register css -->
		<link rel="stylesheet" type="text/css" href="css/new_entry.css">

	</head>

	<body>
		<div class="container-fluid">
			<!-- header -->
			<div class="header row">
				<div class="col-md-2 col-sm-1"></div>
				<h1 class="text-center center col-md-7 col-sm-8">AKGEC LATE ENTRY SYSTEM</h1>
				<!-- empty -->
				{!!  Form::open(['route' => 'logout_submit']) !!}
            <div class="col-md-1 col-sm-1"></div>
            <!-- logout button at top -->
            

            <!-- {!!Form::submit('Logout', array('class' => 'btn btn-default col-md-1 col-sm-1 logout')  ) !!} -->

            
            <button class="btn btn-default col-md-1 col-sm-1 logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                <span> Logout</span>
                <!-- empty -->
                {!! Form::close() !!}
				<!-- empty -->
				<div class="col-md-1 col-sm-1"></div>				
			</div>

			<div class="container block1">
				<div class="row InformationBox">
					<div class="col-md-3 col-sm-4 thumbnail">
						<?php 
                    $image_path="images/".$Session['student_no'].".jpg";
                    echo "<img src=".$image_path.">";
                    ?>
					</div>
					<div class="col-md-1 col-sm-1"></div>
					<div class="col-md-8 col-sm-8 Info">
						<ul>
							<li class=" row Name">Error 404 </li><hr>
							<li class="row St_no"><a href="#modal1" data-toggle="modal" style="text-decoration:none;">
								<button class="btn btn-warning">Add New Student</button></a></li>
								<li class="row Branch">Student Number <?php echo $Session['student_no']; ?> Not Found</li>
								<li class="row Text">Click on Add New Student to make fresh entry.</li>
							</ul>

						</div>
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
							<h3>Enter Particulars</h3>
						</div>
						{!!  Form::open(['route' => 'details_submit']) !!}
						<div class="modal-body">
							<div class="input-group pd">
								<span class="input-group-addon" id="basic-addon1">Name</span>
								<!-- <input type="text" class="form-control" placeholder="Enter Name" aria-describedby="basic-addon1"> -->
								{!! Form::text('studentName', null , array('class' => 'form-control', 'placeholder' => 'Enter Name' ) ) !!}
							</div>                                                                                         

							<div class="input-group pd">
								<span class="input-group-addon" id="basic-addon1">Branch</span>
								<!-- <input type="text" class="form-control" placeholder="Enter Branch" aria-describedby="basic-addon1"> -->
								{!! Form::text('studentBranch', null , array('class' => 'form-control', 'placeholder' => 'Enter Branch' ) ) !!}
							</div>

							<div class="input-group pd">
								<span class="input-group-addon" id="basic-addon1">Student No.</span>
								<!-- <input type="text" class="form-control" value="123455" aria-describedby="basic-addon1"> -->
								{!! Form::text('studentNumber', $Session['student_no'] , array('class' => 'form-control' ) ) !!}

							</div>

							<div class="input-group pd1">
								<span class="input-group-addon" id="basic-addon1">Year</span>
								<!-- <input type="text" class="form-control" placeholder="Enter Year" aria-describedby="basic-addon1"> -->
								{!! Form::text('studentYear', null, array('class' => 'form-control' , 'placeholder' => 'Enter Year') ) !!}

							</div>
						</div>

						<div class="modal-footer">
							<!-- <button class="btn btn-warning" data-dismiss="modal">Submit</button> -->
							{!!Form::submit('Add This Student', array('class' => 'btn btn-warning')  ) !!}

						</div>
					</div>
				</div>
			</div>
			{!! Form::close() !!}

			<!-- javascript			 -->

			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

			<!-- jquery -->
			<script type="text/javascript" src="js/jquery.js"></script>
			<!-- bootstrap -->	
			<script type="text/javascript" src="js/bootstrap.js"></script>		
		</body>
		</html>