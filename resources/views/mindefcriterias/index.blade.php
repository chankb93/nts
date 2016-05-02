<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'MINDEF Criteria')
@section('content')

    <!-- Bootstrap Boilerplate... -->

        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New MINDEF Criteria
                </div>

                <div class="panel-body">


                    {!! Form::model($mindefCriteria, array('route' => array('mindefcriterias.store'))) !!}
                    <!-- {!! Form::open(['url' => 'napfadates']) !!} -->

                        <!-- Title form input -->
                        <div class="form-group">
                            {!! Form::label('mindefage', 'Age Group:') !!}
                            {!! Form::select('mindefage', $mindefages) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('gender', 'Gender:') !!}
                            {!! Form::select('gender', array('M' => 'Male', 'F' => 'Female')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('stations', 'Stations:') !!}
                            {!! Form::select('stations', array('Sit-up' => 'Sit-up', 'Push-up' => 'Push-up', '2.4km' => '2.4km')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('mindefPoint', 'Points:') !!}
                            {!! Form::text('mindefPoint', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('minValue', 'Min Value:') !!}
                            {!! Form::text('minValue', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('gauging', 'Gauge:') !!}
                            {!! Form::select('gauging', array('>' => 'GREATER', '<' => 'LESSER', '=' => 'EQUAL', '-' => 'WITHIN')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('maxValue', 'Max Value:') !!}
                            {!! Form::text('maxValue', null, ['class' => 'form-control']) !!}
                        </div>

                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>Add New MINDEF Criteria
                        </button>

                    {!! Form::close() !!}

                </div>

            <div class="panel-heading">
                Current MINDEF Criteria
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                      <th>Age Group</th>
                      <th>Gender</th>
                      <th>Station</th>
                      <th>Point</th>
                      <th>Min Value</th>
                      <th>Gauge</th>
                      <th>Max Value</th>
                      <th>[Action]</th>
                    </thead>

                    @if (count($mindefCriterias) > 0)
                    <!-- Table Body -->
                    <tbody>
                      @foreach ($mindefCriterias as $mindefCriteria)
                        <tr>
                          <!-- Task Name -->
                          <td class="table-text">
                              <div>{{ $mindefCriteria->mindefAge->age }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $mindefCriteria->gender }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $mindefCriteria->stations }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $mindefCriteria->mindefPoint }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $mindefCriteria->minValue }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $mindefCriteria->gauging }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $mindefCriteria->maxValue }}</div>
                          </td>

                          <td>
                            {!! Form::open(['action' => ['MindefCriteriaController@edit', $mindefCriteria->id], 'method' => 'get']) !!}
                              {!! Form::submit('Edit', ['class'=>'btn btn-danger btn-mini']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['action' => ['MindefCriteriaController@destroy', $mindefCriteria->id], 'method' => 'delete']) !!}
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
