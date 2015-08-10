<!-- Extends Master -->
@extends('master')

<!-- Yield Page Header Title-->
@section('title', 'Late Entry | Login')

<!-- Yield Mid-Content -->
@section('mid_content')

    <div class="wrapper row block">
        <div class="adminstrationLogin col-md-4 col-md-offset-4 col-sm-offset-3 col-sm-6">
            <div class="admLogin">
                <h3 class="text-center">Adminstration Login</h3>
            </div>
            <div class="content1 row">
                <!-- Login Form Open-->
                <form class="form-horizontal col-md-12" role="form" method="post">
                {{ Form::open(array('method'=>'post','url'=>'login')) }}
                <!-- Form Fields-->
                    <div class="form-group margin1">
                        <label for="inputEmail3" class="col-sm-3 col-md-2 control-label">Username
                        </label>
                        <div class="col-sm-8 col-md-9 input">
                        <!-- Username Field -->
                        {{ Form::text('username', null , array('class' => 'form-control', 'placeholder' => 'Username', 'id' => 'inputEmail3') ) }}
                        </div>
                    </div>
                    <!-- Password Field -->
                    <div class="form-group margin2">
                        <label for="inputPassword3" class="col-sm-3 col-md-2 control-label">Password
                        </label>
                        <div class="col-sm-8 col-md-9 input">
                        <!-- Password Field Area -->
                        {{ Form::password('password' , array('class' => 'form-control', 'placeholder' => 'Password', 'id' => 'inputPassword3') ) }}
                        </div>
                    </div>
                    <!-- Login Button -->
                    <div class="button row">
                    <!-- Submit the Login Form -->
                    {{ Form::submit('Login', array('class' => 'btn btn-lg col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4 button1')  ) }}
                    </div>  
                    <!-- Login Form Close -->
                    {{ Form::close() }}
                </form>
            </div>
        </div>
    </div>
  
@endsection








