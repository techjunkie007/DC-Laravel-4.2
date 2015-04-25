<html>
<head>
    <title>Late Entry | Next Entry</title>
    
    <!-- bootstrapcdn -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- css file -->
    <link rel="stylesheet" type="text/css" href="../public/css/inside.css">
    <!-- css file -->
    <link rel="stylesheet" type="text/css" href="../public/css/mainpage.css">     
    <!-- clock1 css-->
    <link rel="stylesheet" type="text/css" href="../public/css/clock1.css">
    <!-- register css -->
    <link rel="stylesheet" type="text/css" href="../public/css/register.css">

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
            {!! Form::open(['route' => 'register_entry']) !!}

            <div class="container block1">
                <div class="row InformationBox">
                    <div class="col-md-3 col-sm-3 thumbnail">
                     <?php 
                     $image_path="images/".$info->student_id.".jpg";
                     echo "<img src=".$image_path.">";
                     ?>
                 </div>
                 <div class="col-md-1 col-sm-1 border"></div>
                 <div class="col-md-8 col-sm-6 Info">
                    <ul>
                        <li class=" row Name">{{ $info->student_name  }}</li><hr>
                        <li class="row St_no">{{ $info->student_id }}</li>
                        <li class="row Branch"><?php
                        switch($info->branch){
                            case 'CS': {
                                $branch="Computer Science";
                                break;
                            }
                            case 'IT': {
                                $branch="Information Technology";
                                break;
                            } 
                            case 'EN': {
                                $branch="Electrical Engineering";
                                break;
                            }
                            case 'EC': {
                                $branch="Electronics & Communication";
                                break;
                            }
                            case 'ME': {
                                $branch="Mechanical";
                                break;
                            }
                            case 'EI': {
                                $branch="Electronics & Instrumentation";
                                break;
                            } 
                            case 'CE': {
                                $branch="Civil Engineering";
                                break;
                            }
                            case 'MCA': {
                                $branch="MCA";
                                break;
                            }
                            case 'MBA': {
                                $branch="MBA";
                                break;
                            }
                        }
                        echo $branch;
                        ?></li>

                        <li class="row Text">
                            <?php
                            $count=0;
                            ?>
                            @foreach ($entries as $entry) 
                            $count++;
                            @endforeach
                            {{$info->student_name." has ".$count." Late Entries till now."}}
                            </li>
                        </ul>
                    </div>

                   <!--  <div class="row"><button class="btn-lg btn-warning register_button col-md-4 col-md-offset-8 col-sm-4">Register Late Entry</button></div> -->
                    
                    <div class="row">
                        {!!Form::submit('Register Late Entry', array('class' => 'btn-lg btn-warning register_button col-md-4 col-md-offset-8 col-sm-4', 'id' => 'loginButton')  ) !!}
                    </div>

                </div>

            </div>
              {!! Form::close() !!}


            <!-- footer -->
            <div class="footer row">
                <h4 class="text-center">&copy;<strong>SOFTWARE INCUBATOR</strong></h4>
            </div>
        </div>                              


        <!-- javascript -->

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

        <!-- jquery -->
        <script type="text/javascript" src="jquery.js"></script>
        <!-- bootstrap -->  
        <script type="text/javascript" src="bootstrap.js"></script>     
    </body>
    </html>