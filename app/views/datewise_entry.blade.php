<!-- Extends Master -->
@extends('master')

<!-- Yield Page Header Title-->
@section('title', 'Late Entry | Datewise Entry')

<!-- Yield Logout Button -->
@section('logout_button')

    <!-- Logout Button -->
    <button class="btn btn-default col-md-1 col-sm-1 logout">
    <span class="glyphicon glyphicon-off" aria-hidden="true">
    </span>
    <span> Logout</span>

@endsection

<!-- Yield Mid-Content -->
@section('mid_content')

    <div class="container block1">
        <div class="row InformationBox">
            <div class="col-md-3 col-sm-4 thumbnail">
            <!-- Thumbnail of Student -->
            <?php 
            $image_path="images/".$info->student_id.".jpg";
            echo "<img src=".$image_path.">";
            ?>
            </div>
            <!-- Empty -->
            <div class="col-md-1 col-sm-1">
            </div>
            <div class="col-md-8 col-sm-8 Info">
                <ul>
                    <!-- Student's Name -->
                    <li class=" row Name">{{ $info->student_name  }}</li><hr>
                    <!-- Student Number -->
                    <li class="row St_no">{{ $info->student_id }}</li>
                    <!-- Student's Branch -->
                    <li class="row Branch">
                        <?php
                        switch($info->branch)
                        {
                            case 'CS': 
                            {
                                $branch="Computer Science";
                                break;
                            }
                            case 'IT': 
                            {
                                $branch="Information Technology";
                                break;
                            } 
                            case 'EN': 
                            {
                                $branch="Electrical Engineering";
                                break;
                            }
                            case 'EC': 
                            {
                                $branch="Electronics & Communication";
                                break;
                            }
                            case 'ME': 
                            {
                                $branch="Mechanical";
                                break;
                            }
                            case 'EI': 
                            {
                                $branch="Electronics & Instrumentation";
                                break;
                            } 
                            case 'CE': 
                            {
                                $branch="Civil Engineering";
                                break;
                            }
                            case 'MCA': 
                            {
                                $branch="MCA";
                                break;
                            }
                            case 'MBA': 
                            {
                                $branch="MBA";
                                break;
                            }
                        }
                        echo $branch;
                        ?>
                    </li>
                    <li class="row Text">
                        <!-- Number of Entries Message -->

                        {{$info->student_name." has ".$counter." Late Entries till now."}} 
                    </li>
                </ul>
                <!-- Register Entry Form Open -->
                {{ Form::open(['url' => 'datewise-register']) }}
                <div class="row">
                    <!-- Submit Entry Button -->
                    {{ Form::submit('Register Late Entry', array('class' => 'btn-lg btn-warning register_button', 'id' => 'loginButton')  ) }}
                </div>
                <!-- Register Entry Form Close -->
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection








