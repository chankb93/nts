<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'MOE Criteria')
@section('content')

    <!-- Bootstrap Boilerplate... -->

        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New MOE Criteria
                </div>

                <div class="panel-body">


                    {!! Form::model($moeCriteria, array('route' => array('moecriterias.store'))) !!}
                    <!-- {!! Form::open(['url' => 'napfadates']) !!} -->

                    <!-- Title form input -->
                    <div class="form-group">
                        {!! Form::label('moeage', 'Age Group:') !!}
                        {!! Form::select('moeage', $moeages) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('gender', 'Gender:') !!}
                        {!! Form::select('gender', array('M' => 'Male', 'F' => 'Female')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('stations', 'Stations:') !!}
                        {!! Form::select('stations', array('Sit-up' => 'Sit-up', 'Standing Broad Jump' => 'Standing Broad Jump'
                        , 'Sit &amp; Reach' => 'Sit &amp; Reach', 'Push-up' => 'Push-up', 'Shuttle Run' => 'Shuttle Run', '2.4km' => '2.4km')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('pGrade', 'Performance Grade:') !!}
                        {!! Form::select('pGrade', array('A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('pBand', 'Performance Band:') !!}
                        {!! Form::select('pBand', array('Outstanding' => 'Outstanding', 'Very Good' => 'Very Good', 'Good' => 'Good'
                        , 'Satisfactory' => 'Satisfactory')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('moePoint', 'Points:') !!}
                        {!! Form::text('moePoint', null, ['class' => 'form-control']) !!}
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
                            <i class="fa fa-btn fa-plus"></i>Add New MOE Criteria
                        </button>

                    {!! Form::close() !!}

                </div>

            <div class="panel-heading">
                Current MOE Criteria
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                      <th>Age Group</th>
                      <th>Gender</th>
                      <th>Station</th>
                      <th>Performance Grade</th>
                      <th>Performance Band</th>
                      <th>Point</th>
                      <th>Min Value</th>
                      <th>Gauge</th>
                      <th>Max Value</th>
                      <th>[Action]</th>
                    </thead>

                    @if (count($moeCriterias) > 0)
                    <!-- Table Body -->
                    <tbody>
                      @foreach ($moeCriterias as $moeCriteria)
                        <tr>
                          <!-- Task Name -->
                          <td class="table-text">
                              <div>{{ $moeCriteria->moeage->age }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $moeCriteria->gender }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $moeCriteria->stations }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $moeCriteria->pGrade }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $moeCriteria->pBand }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $moeCriteria->moePoint }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $moeCriteria->minValue }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $moeCriteria->gauging }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $moeCriteria->maxValue }}</div>
                          </td>

                          <td>
                            {!! Form::open(['action' => ['MoeCriteriaController@edit', $moeCriteria->id], 'method' => 'get']) !!}
                              {!! Form::submit('Edit', ['class'=>'btn btn-danger btn-mini']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['action' => ['MoeCriteriaController@destroy', $moeCriteria->id], 'method' => 'delete']) !!}
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
