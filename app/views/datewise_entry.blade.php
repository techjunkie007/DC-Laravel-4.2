<html>
<head>
    <title>Late Entry | Datewise</title>

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

       <!-- javascript          -->
                                            <!-- jquery -->
                                            <script type="text/javascript" src="js/jquery.js"></script>

                                            <!-- Latest compiled and minified JavaScript -->
                                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


                                            <!-- bootstrap -->  
                                            <script type="text/javascript" src="js/bootstrap.js"></script>     

</head>

<body>
    <div class="container-fluid">
        <!-- header -->
        <div class="header row">
            <h1 class="text-center"><strong>AKGEC LATE ENTRY SYSTEM</strong></h1>
            <!-- logout button at top -->
            {!!  Form::open(['route' => 'logout_submit']) !!}
            <div class="col-md-1 col-sm-1"></div>
            <!-- logout button at top -->
            

            <!-- {!!Form::submit('Logout', array('class' => 'btn btn-default col-md-1 col-sm-1 logout')  ) !!} -->

            
            <button class="btn btn-default col-md-1 col-sm-1 logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                <span> Logout</span>
                <!-- empty -->
                {!! Form::close() !!}
                <!-- back button at top -->
                {!!  Form::open(['route' => 'back_button']) !!}
                {!!Form::submit('BACK', array('class' => 'btn btn-default col-md-offset-1 logout', 'id' => 'backButton')  ) !!}
                {!! Form::close() !!}
            </div>

            <!-- jumbotron -->
            <div class="wrapper row block">
                <div class="jumbotron col-md-8 jbt" style="padding-right:0px; padding-left:4%;">    <!-- padding for accomodating button -->
                    <!-- pic -->
                    <div class="col-md-2 thumbnail">                        
                    </div>
                    <!-- Info -->
                    <div class="col-md-8 info">
                        <!-- name -->
                        <div class="name">
                            {{ $info->student_name  }}
                        </div>
                        <hr>
                        <!-- student no. -->
                        <div class="stud_no">
                            {{ $info->student_id }}
                        </div>  
                        <!-- branch -->
                        <div class="branch">
                            <?php
                            switch($info->branch){
                                case 'CS': {
                                    $branch="Computer Science";
                                    break;}
                                    case 'IT': {
                                        $branch="Information Technology";
                                        break;} 
                                        case 'EN': {
                                            $branch="Electrical Engineering";
                                            break;}
                                            case 'EC': {
                                                $branch="Electronics & Communication";
                                                break;}
                                                case 'ME': {
                                                    $branch="Mechanical";
                                                    break;}
                                                    case 'EI': {
                                                        $branch="Electronics & Instrumentation";
                                                        break;} 
                                                        case 'CE': {
                                                            $branch="Civil Engineering";
                                                            break;}
                                                            case 'MCA': {
                                                                $branch="MCA";
                                                                break;}
                                                                case 'MBA': {
                                                                    $branch="MBA";
                                                                    break;}
                                                                }
                                                                echo $branch;
                                                                ?>

                                                            </div>
                                                        </div> 

                                                        {!! Form::open(['route' => 'register_entry']) !!}
                                                        {!!Form::submit('Register Late Entry', array('class' => 'btn-lg btn-warning register_button', 'id' => 'loginButton')  ) !!}
                                                        {!! Form::close() !!}

                                                    </div>                                  
                                                </div>


                                                <!-- footer -->
                                                <div class="footer row">
                                                    <h4 class="text-center">&copy;<strong>SOFTWARE INCUBATOR</strong></h4>
                                                </div>
                                            </div>                              


                                         
                                        </body>
                                        </html>