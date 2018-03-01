@extends('layouts.app')
@section('content')
    <div class="panel-body">
        @include('common.errors')
        {{ Form::open(['route' => 'task.store']) }}
            <table>
                @if (session('status'))
                    <div>{{ session('status') }}</div>
                @endif
                <tr>
                    <td> {{ trans('message.Task') }} </td>
                    <td> {{ Form::text('name') }} </td>
                </tr>
                <tr>
                    <td colspan="2"> {{ Form::submit(trans('message.Add')) }} </td>
                </tr>
            </table>
        </div>      
        {{ Form::close() }}   
    <div>
            <div> {{ trans('message.Current_Tasks') }} </div>
            <div> {{ trans('message.Task') }} </div>
            @foreach ($tasks as $task)                    
                <div>{{ Form::open(['method' => 'DELETE', 'route'=>['task.destroy', $task->id]]) }}</div>
                    <tr>
                        <td> {{ $task->name }} </td>
                        <td> {{ Form::submit(trans('message.delete')) }} </td>
                    </tr>
                {{ Form::close() }}
            @endforeach
    </div>
@endsection
