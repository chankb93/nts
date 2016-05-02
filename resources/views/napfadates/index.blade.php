<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'Test Dates')
@section('content')

    <!-- Bootstrap Boilerplate... -->

        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New NAPFA Test Date
                </div>

                <div class="panel-body">


                    {!! Form::model($napfaDate, array('route' => array('napfadates.store'))) !!}
                    <!-- {!! Form::open(['url' => 'napfadates']) !!} -->

                        <!-- Title form input -->
                        <div class="form-group">
                            {!! Form::label('school', 'School:') !!}
                            {!! Form::select('school', $schools) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('regOpenDate', 'Registration Open Date:') !!}
                            {!! Form::date('regOpenDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                        </div>

                        <!-- Content form input -->
                        <div class="form-group">
                            {!! Form::label('regCloseDate', 'Registration Close Date:') !!}
                            {!! Form::date('regCloseDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('testDate', 'Test Date/Time:') !!}
                            {!! Form::date('testDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('venue', 'Venue:') !!}
                            {!! Form::text('venue', "SP Sports Hall", ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('regMax', 'Max Registration:') !!}
                            {!! Form::text('regMax', 200, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('bidNumStart', 'Bid From:') !!}
                            {!! Form::text('bidNumStart', 1, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('stations', 'Stations:') !!}
                            <br><br>
                            {!! Form::label('stations[situp]', 'Sit-Up') !!}
                            {!! Form::checkbox('stations[situp]', 1, true) !!}
                            <br>
                            {!! Form::label('stations[sbj]', 'SBJ') !!}
                            {!! Form::checkbox('stations[sbj]', 1, true) !!}
                            <br>
                            {!! Form::label('stations[sitAndReach]', 'Sit &amp; Reach') !!}
                            {!! Form::checkbox('stations[sitAndReach]', 1, true) !!}
                            <br>
                            {!! Form::label('stations[pushUp]', 'Push Up') !!}
                            {!! Form::checkbox('stations[pushUp]', 1, true) !!}
                            <br>
                            {!! Form::label('stations[shuttleRun]', 'Shuttle Run') !!}
                            {!! Form::checkbox('stations[shuttleRun]', 1, true) !!}
                            <br>
                            {!! Form::label('stations[running]', '2.4KM Run') !!}
                            {!! Form::checkbox('stations[running]', 1, true) !!}
                        </div>

                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>Add New NAPFA Date
                        </button>

                    {!! Form::close() !!}

                </div>

            <div class="panel-heading">
                Current NAPFA Test Dates
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                      <th>School</th>
                      <th>Registration Open</th>
                      <th>Registration Close</th>
                      <th>Test Date/Time</th>
                      <th>Venue</th>
                      <th>Max Student</th>
                      <th>Bid From</th>
                      <th>No. of Station</th>
                      <th>[Action]</th>
                    </thead>

                    @if (count($napfaDates) > 0)
                    <!-- Table Body -->
                    <tbody>
                      @foreach ($napfaDates as $napfaDate)
                        <tr>
                          <!-- Task Name -->
                          <td class="table-text">
                              <div>{{ $napfaDate->school->name }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $napfaDate->regOpenDate }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $napfaDate->regCloseDate }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $napfaDate->testDate }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $napfaDate->venue }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $napfaDate->regMax }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $napfaDate->bidNumStart }}</div>
                          </td>

                          <td>
                            {!! Form::open(['action' => ['NapfaDateController@edit', $napfaDate->id], 'method' => 'get']) !!}
                              {!! Form::submit('Edit', ['class'=>'btn btn-danger btn-mini']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['action' => ['NapfaDateController@destroy', $napfaDate->id], 'method' => 'delete']) !!}
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
