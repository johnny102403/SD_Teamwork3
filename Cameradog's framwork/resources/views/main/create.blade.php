<!-- main site to create new messages -->

@extends('layouts.default')

@section('title', 'New Message')

@section('content')
    <div class="row">
        <div id="section1" class="container-fluid">
            <h1 class="text-center">New Message</h1>
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
            <form action="{{ URL('main') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <textarea id="createCont" name="content" rows="10" class="form-control" placeholder='Write some messages' required="required"></textarea>
                <br>
                <button class="btn btn-primary">Add message</button>
            </form>
        </div>
    </div>
@stop
