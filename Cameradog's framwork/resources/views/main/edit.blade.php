<!-- main edit page to edit messages -->

@extends('layouts.default')

@section('title', 'Edit Message')

@section('content')
    <div class="row">
        <div id="section1" class="container-fluid">
            <h1 class="text-center">Edit Message</h1>
            <!-- notification -->
            @if($errors->any())
                <ul class='alert alert-danger'>
                    <!-- @foreach($errors->all() as $error) -->
                    <li>
                        <span>You need to write something!!</span>
                    </li>
                    <!-- @endforeach -->
                </ul>
            @endif

            <!-- form -->
            <form action="{{ URL('main/'.$messages->id) }}" method="POST">
                <input name='_method' type='hidden' value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <textarea id="createCont" name="content" rows="10" class="form-control" placeholder='Write some messages' required="required">{{ $messages->content}}</textarea>
                <br>
                <button class="btn btn-primary">Edit message</button>
            </form>
        </div>
    </div>
@stop
