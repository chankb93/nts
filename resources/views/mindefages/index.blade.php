<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'Age')
@section('content')

    <!-- Bootstrap Boilerplate... -->

        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Age Group
                </div>

                <div class="panel-body">

                  {!! Form::model($mindefage, array('route' => array('mindefages.store'))) !!}

                      <!-- Title form input -->
                      <div class="form-group">
                          {!! Form::label('age', 'Age group:') !!}
                          {!! Form::text('age', null, ['class' => 'form-control']) !!}
                      </div>

                      <button type="submit" class="btn btn-default">
                          <i class="fa fa-btn fa-plus"></i>Add New Age Group
                      </button>

                  {!! Form::close() !!}

                </div>

            <div class="panel-heading">
                Current Age Group
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                      <th>Age Group</th>
                    </thead>

                    @if (count($mindefages) > 0)
                    <!-- Table Body -->
                    <tbody>
                      @foreach ($mindefages as $mindefage)
                        <tr>
                          <!-- Task Name -->
                          <td class="table-text">
                              <div>{{ $mindefage->age }}</div>
                          </td>

                          <td>
                            {!! Form::open(['action' => ['MindefAgeController@edit', $mindefage->id], 'method' => 'get']) !!}
                              {!! Form::submit('Edit', ['class'=>'btn btn-danger btn-mini']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['action' => ['MindefAgeController@destroy', $mindefage->id], 'method' => 'delete']) !!}
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
