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

    <div class="container col-4 bg-grey mt-5 p-4 border d-flex gap-3">
        @foreach($tasks as $task)
            <div class="task-item mb-4 border rounded p-3">
                <p>Todo: {{$loop->iteration}}</p>
                <form method="post" action="{{route('tasks.update', $task->id )}}">
                    @csrf

                    <div class="form-group pt-3">
                        <label for="exampleInputPassword1">Status</label>
                        <input type="checkbox" name="completed" class="task-checkbox" {{ $task->completed ? 'checked' : '' }}>
                    </div>


                    <div class="form-group pt-3">
                        <label for="exampleInputPassword1">Title</label>
                        <input type="text" required name="title"  class="form-control" id="exampleInputPassword1" value="{{ $task->title }}" placeholder="{{ $task->title }}">
                    </div>


                    <div class="form-group pt-3">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" required name="desc" value="{{ $task->desc }}"  class="form-control" id="exampleInputPassword1" placeholder="title">
                    </div>
                    <div class="form-group pt-3">
                        <button class="w-100 btn btn-lg btn-success btn-sm text-light col-1" type="submit">Save</button>
                    </div>
                </form>
                <form method="post" class="p-2" action="{{route('tasks.destroy',$task->id)}}">
                    @csrf
                    <button class="w-100 btn btn-lg btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>


@endsection
