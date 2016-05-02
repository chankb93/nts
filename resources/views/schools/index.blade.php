<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'School')
@section('content')

    <!-- Bootstrap Boilerplate... -->

        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add School
                </div>

                <div class="panel-body">

                  {!! Form::model($school, array('route' => array('schools.store'))) !!}

                      <!-- Title form input -->
                      <div class="form-group">
                          {!! Form::label('name', 'Name:') !!}
                          {!! Form::text('name', null, ['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                          {!! Form::label('description', 'Description:') !!}
                          {!! Form::text('description', null, ['class' => 'form-control']) !!}
                      </div>

                      <button type="submit" class="btn btn-default">
                          <i class="fa fa-btn fa-plus"></i>Add New School
                      </button>

                  {!! Form::close() !!}

                </div>

            <div class="panel-heading">
                Current School
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                      <th>Name</th>
                      <th>Description</th>
                    </thead>

                    @if (count($schools) > 0)
                    <!-- Table Body -->
                    <tbody>
                      @foreach ($schools as $school)
                        <tr>
                          <!-- Task Name -->
                          <td class="table-text">
                              <div>{{ $school->name }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $school->description }}</div>
                          </td>

                          <td>
                            {!! Form::open(['action' => ['SchoolController@edit', $school->id], 'method' => 'get']) !!}
                              {!! Form::submit('Edit', ['class'=>'btn btn-danger btn-mini']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['action' => ['SchoolController@destroy', $school->id], 'method' => 'delete']) !!}
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
