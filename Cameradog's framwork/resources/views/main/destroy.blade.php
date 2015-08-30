<!-- dummy page for router to redirect to main index after deleting messages -->
<!-- user won't see this -->
@extends('layouts.default')

@section('title', 'Delete Message')

@section('content')
    <div class="row">
        <div id="section1" class="container-fluid">
            <h1 class="text-center">Delete Message</h1>
            @if($errors->any())
                <ul class='alert alert-danger'>
                    <!-- @foreach($errors->all() as $error) -->
                    <li>
                        <span>You need to write something!!</span>
                    </li>
                    <!-- @endforeach -->
                </ul>
            @endif
            <form action="{{ URL('main/'.$messages->id) }}" method="POST">
                <input name='_method' type='hidden' value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <textarea id="createCont" name="content" rows="10" class="form-control" placeholder='Write some messages' required="required">{{ $messages->content}}</textarea>
                <br>
                <button class="btn btn-primary">Delete message</button>
            </form>
        </div>
    </div>
@stop
