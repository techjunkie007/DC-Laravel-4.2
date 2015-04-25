<html>
  <head>
    <title>Late Entry | Home</title>  
          <!-- bootstrapcdn -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
          <!-- css file -->
    <link rel="stylesheet" type="text/css" href="../public/css/mainpage.css">
  </head>

  <body>
    <div class="container-fluid">
            <!-- header -->
      <div class="header row"><h1 class="text-center">AKGEC LATE ENTRY SYSTEM</h1></div>
      
      <div class="wrapper row block">
          <div class="adminstrationLogin col-md-4 col-md-offset-4 col-sm-offset-3 col-sm-6">
            <div class="admLogin"><h3 class="text-center">Adminstration Login</h3></div>
            <div class="content1 row">
                  <!-- horizontal bootstrap form -->
              <form class="form-horizontal col-md-12" role="form" method="post">
           {{Form::open(array('method'=>'post','url'=>'login'))}}
           <!-- username field-->
                <div class="form-group margin1">
                  <label for="inputEmail3" class="col-sm-3 col-md-2 control-label">Username</label>
                  <div class="col-sm-8 col-md-9 input">
                    <!-- <input type="text" class="form-control" id="inputEmail3" placeholder="Username" /> -->
                    {{ Form::text('username', null , array('class' => 'form-control', 'placeholder' => 'Username', 'id' => 'inputEmail3') ) }}
                  </div>
                </div>
                        <!-- password field-->
                <div class="form-group margin2">
                  <label for="inputPassword3" class="col-sm-3 col-md-2 control-label">Password</label>
                  <div class="col-sm-8 col-md-9 input">
                    <!-- <input type="password" class="form-control" id="inputPassword3" placeholder="Password" /> -->
                     {{ Form::password('password' , array('class' => 'form-control', 'placeholder' => 'Password', 'id' => 'inputPassword3') ) }}
                  </div>
                </div>
                        <!-- login button -->
                <div class="button row">
                  <!-- <button class="btn btn-lg col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4 button1" type="submit">Login</button> -->
                  {{Form::submit('Login', array('class' => 'btn btn-lg col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4 button1')  ) }}
                </div>  
            {{ Form::close() }}
           </form>
            </div>
          </div>
      </div>
      
      <div class="footer row">
        <h4 class="text-center">&copy;<strong>SOFTWARE INCUBATOR</strong></h4>
      </div>
    </div>    
  </body>
</html>