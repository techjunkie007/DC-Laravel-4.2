<!-- Extends Master -->
@extends('master')

<!-- Yield Page Header Title-->
@section('title', 'Late Entry | Three Entry Report')

@section('print_button')
    {{Form::open(['route' => 'download'])}}
    <div>
        <button class="btn btn-default col-md-1 col-sm-1 col-md-offset-1 col-sm-offset-1 logout">
            <span class="glyphicon glyphicon-open-file glyph_pad" aria-hidden="true"></span>
            <span> Print</span>
        </button>
        {{Form::close()}}
    </div>
@endsection

<!-- Yield Logout Button -->
@section('logout_button')

    <!-- Logout Form Open -->
    {{ Form::open(['route' => 'logout_submit']) }}
    <!-- Logout Button -->
    <button class="btn btn-default col-md-1 col-sm-1 logout">
    <span class="glyphicon glyphicon-off" aria-hidden="true">
    </span>
    <span> Logout</span>
    <!-- Logout Form Close -->
    {{ Form::close() }}

@endsection

@section('mid_content')
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
                    </tbody>
                </table>
            </div>  
        </div>
    </div>


@endsection