<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'System User')
@section('content')

    <!-- Bootstrap Boilerplate... -->

        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New User
                </div>

                <div class="panel-body">


                    {!! Form::model($sysUser, array('route' => array('sysusers.store'))) !!}
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
                            <i class="fa fa-btn fa-plus"></i>Add New User
                        </button>

                    {!! Form::close() !!}

                </div>

            <div class="panel-heading">
                Current User
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                      <th>Status</th>
                      <th>Login ID</th>
                      <th>Name</th>
                      <th>System Role</th>
                      <th>Email</th>
                      <th>Contact no.</th>
                      <th>[Action]</th>
                    </thead>

                    @if (count($sysUsers) > 0)
                    <!-- Table Body -->
                    <tbody>
                      @foreach ($sysUsers as $sysUser)
                        <tr>
                          <!-- Task Name -->
                          <td class="table-text">
                              <div>{{ $sysUser->status }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $sysUser->loginID }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $sysUser->userName }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $sysUser->systemRole }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $sysUser->email }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $sysUser->contact }}</div>
                          </td>

                          <td>
                            {!! Form::open(['action' => ['SysUserController@edit', $sysUser->id], 'method' => 'get']) !!}
                              {!! Form::submit('Edit', ['class'=>'btn btn-danger btn-mini']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['action' => ['SysUserController@destroy', $sysUser->id], 'method' => 'delete']) !!}
                              {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-mini']) !!}
                            {!! Form::close() !!}
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                    @endif
                </table>
            </div>
        </div>
      </div>


@endsection
