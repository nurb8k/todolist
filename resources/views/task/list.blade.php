@extends('layouts.master')

@section('content')
    <div class="container col-3 border pt-2">
        <form method="post" action="{{ route('tasks.store') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Create Task</h1>
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="title" placeholder="Title" required="required" autofocus>
                <label for="floatingName">Title</label>
                @if ($errors->has('title'))
                    <span class="text-danger text-left">{{ $errors->first('title')}}</span>
                @endif
            </div>
            <div class="form-group form-floating mb-3">
                <textarea class="form-control" required name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
                <label for="floatingName">Description</label>
                @if ($errors->has('desc'))
                    <span class="text-danger text-left">{{ $errors->first('desc')}}</span>
                @endif
            </div>
            <button class="w-100 btn btn-lg btn-primary btn-sm" type="submit">create</button>
        </form>
    </div>

    <div class="container col-4 bg-grey mt-5 p-4 border">
        @foreach($tasks as $task)
            <div class="task-item">
                <form method="post" action="{{route('tasks.update', $task->id )}}">
                    @csrf
                    <input type="checkbox" name="completed" class="task-checkbox" {{ $task->completed ? 'checked' : '' }}>
                    <input name="title" value="{{ $task->title }}" >
                    <input name="desc" value="{{ $task->desc }}" type="text">

                    <button class="w-100 btn btn-lg btn-warning btn-sm" type="submit">update</button>
                </form>
                <form method="post" action="{{route('tasks.destroy',$task->id)}}">
                    @csrf
                    <button class="w-100 btn btn-lg btn-danger btn-sm" type="submit">delete</button>
                </form>
            </div>
        @endforeach
    </div>


@endsection
