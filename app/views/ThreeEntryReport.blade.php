<html>
    <head>
        <title>Late Entry | Three Entry Report</title>
    
        <!-- bootstrapcdn -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!-- css file -->
        <link rel="stylesheet" type="text/css" href="css/inside.css">
        <!-- css file -->
        <link rel="stylesheet" type="text/css" href="css/mainpage.css"> 
        <!-- report css  -->
        <link rel="stylesheet" type="text/css" href="css/report.css">       
    </head>

    <body>
        <div class="container-fluid">
                        <!-- header -->
            <div class="header row">

                {{Form::open(['route' => 'download'])}}
                <div>

                <button class="btn btn-default col-md-1 col-sm-1 col-md-offset-1 col-sm-offset-1 logout">

                    <span class="glyphicon glyphicon-open-file glyph_pad" aria-hidden="true"></span>
                    <span> Print</span>
                </button>
                {{Form::close()}}
                </div>


                <h1 class="text-center center col-md-7 col-sm-8">AKGEC LATE ENTRY SYSTEM</h1>
                <!-- empty -->
                <div class="col-md-1 col-sm-1"></div>
                <!-- logout button at top -->
                <button class="btn btn-default col-md-1 col-sm-1 logout">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    <span> Logout</span>
                </button>
                <!-- empty -->
                <div class="col-md-1 col-sm-1"></div>               
            </div>
            
            <div class="container block">
                <div class="row Heading">
                    <h2 class="cl-md-offset-1 tb">Overall Records Report</h2>
                    <div class="overflo">
                        <table class="table">
                            <thead>
                                <td><h4>S.No.</h4></td>
                                <td><h4>Student No.</h4></td>
                                <td><h4>Name</h4></td>
                                <td><h4>Branch</h4></td>
                                <td><h4>Year</h4></td>
                                <td><h4>Late Entries</h4></td>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>000000</td>
                                    <td>Someone_example</td>
                                    <td>CSE</td>
                                    <td>1</td>
                                    <td>infinite</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>000000</td>
                                    <td>Someone_example</td>
                                    <td>CSE</td>
                                    <td>1</td>
                                    <td>infinite</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>000000</td>
                                    <td>Someone_example</td>
                                    <td>Someone_example</td>
                                    <td>1</td>
                                    <td>infinite</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>000000</td>
                                    <td>Someone_example</td>
                                    <td>CSE</td>
                                    <td>1</td>
                                    <td>infinite</td>
                                </tr>   
                                <tr>
                                    <td>5.</td>
                                    <td>000000</td>
                                    <td>Someone_example</td>
                                    <td>CSE</td>
                                    <td>1</td>
                                    <td>infinite</td>
                                </tr><tr>
                                    <td>5.</td>
                                    <td>000000</td>
                                    <td>Someone_example</td>
                                    <td>CSE</td>
                                    <td>1</td>
                                    <td>infinite</td>
                                </tr><tr>
                                    <td>5.</td>
                                    <td>000000</td>
                                    <td>Someone_example</td>
                                    <td>CSE</td>
                                    <td>1</td>
                                    <td>infinite</td>
                                </tr><tr>
                                    <td>5.</td>
                                    <td>000000</td>
                                    <td>Someone_example</td>
                                    <td>CSE</td>
                                    <td>1</td>
                                    <td>infinite</td>
                                </tr><tr>
                                    <td>5.</td>
                                    <td>000000</td>
                                    <td>Someone_example</td>
                                    <td>CSE</td>
                                    <td>1</td>
                                    <td>infinite</td>
                                </tr><tr>
                                    <td>5.</td>
                                    <td>000000</td>
                                    <td>Someone_example</td>
                                    <td>CSE</td>
                                    <td>1</td>
                                    <td>infinite</td>
                                </tr><tr>
                                    <td>5.</td>
                                    <td>000000</td>
                                    <td>Someone_example</td>
                                    <td>CSE</td>
                                    <td>1</td>
                                    <td>infinite</td>
                                </tr><tr>
                                    <td>5.</td>
                                    <td>000000</td>
                                    <td>Someone_example</td>
                                    <td>CSE</td>
                                    <td>1</td>
                                    <td>infinite</td>
                                </tr><tr>
                                    <td>5.</td>
                                    <td>000000</td>
                                    <td>Someone_example</td>
                                    <td>CSE</td>
                                    <td>1</td>
                                    <td>infinite</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>

        
            <!-- footer -->
            <div class="footer row">
                <h4 class="text-center">&copy;<strong>SOFTWARE INCUBATOR</strong></h4>
            </div>
        </div>  
        

        <!-- javascript          -->

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

                <!-- jquery -->
        <script type="text/javascript" src="jquery.js"></script>
                     <!-- bootstrap --> 
        <script type="text/javascript" src="bootstrap.js"></script>
    </body>
</html>