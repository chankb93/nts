<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'Supports')
@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel panel-default">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add Help Support
        </div>

        <div class="panel-body">

            {!! Form::model($support, array('route' => array('supports.store'))) !!}

            <!-- Title form input -->
            {!! Form::label('description', 'Description:') !!}
            <div class="form-group">
                {!! Form::textarea('description', null, ['size' => '35x5']) !!}
            </div>

            <button type="submit" class="btn btn-default">
                <i class="fa fa-btn fa-plus"></i>Add Help Support
            </button>

            {!! Form::close() !!}

        </div>

        <div class="panel-heading">
            Current Help Support
        </div>
        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- Table Headings -->
                <thead>

                <th>Description</th>
                </thead>

                @if (count($supports) > 0)
                <!-- Table Body -->
                <tbody>
                    @foreach ($supports as $support)
                    <tr>
                        <!-- Task Name -->


                        <td class="form-group">
                            <div>{!! Form::textarea('description', $support->description, ['size' => '35x5']) !!}</div>
                        </td>

                        <td>

                            {!! Form::open(['action' => ['SupportController@edit', $support->id], 'method' => 'get']) !!}
                            {!! Form::submit('Edit', ['class'=>'btn btn-danger btn-mini']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['action' => ['SupportController@destroy', $support->id], 'method' => 'delete']) !!}
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
