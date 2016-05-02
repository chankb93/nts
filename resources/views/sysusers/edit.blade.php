<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'Modify User')
@section('content')

    <!-- Bootstrap Boilerplate... -->

        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Modify User
                </div>

                <div class="panel-body">


                    {!! Form::model($sysUser, array('route' => array('sysusers.update', $sysUser->id), 'method' => 'PUT')) !!}
                    <!-- {!! Form::open(['url' => 'napfadates']) !!} -->

                        <!-- Title form input -->
                        <div class="form-group">
                            {!! Form::label('status', 'SP staff or student?') !!}
                            {!! Form::text('status', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('loginID', 'Login ID:') !!}
                            {!! Form::text('loginID', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Content form input -->
                        <div class="form-group">
                            {!! Form::label('userName', 'Full Name:') !!}
                            {!! Form::text('userName', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('systemRole', 'System Role:') !!}
                            {!! Form::select('systemRole', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email:') !!}
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contact', 'Contact:') !!}
                            {!! Form::text('contact', null, ['class' => 'form-control']) !!}
                        </div>

                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn"></i>Modify User
                        </button>

                    {!! Form::close() !!}

                </div>
        </div>
      </div>


@endsection
