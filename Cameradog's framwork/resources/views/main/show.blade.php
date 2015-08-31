<!-- delete page, to show messages user want to delete -->

@extends('layouts.default')

@section('title', 'Delete Message')

@section('content')
    <div class="row">
        <div id="section1" class="container-fluid">
            <h1 class="text-center">Delete Message</h1>
            <div id="sectionDelete">
                <span class='userFont'>{{$messages->name}}</span>
                <p class='contentFont'>{{$messages->content}}</p>
                <p class='timeFont'>{{$messages->time}}</p>
                <br>
                <span class="deleteMs">Do you want to delete this message?</span>
                <button id='notDelete' class="btn btn-info">Maybe not</button>
                <form action="{{ URL('main/'.$messages->id) }}" method="POST">
                    <input name='_method' type='hidden' value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-danger">Delete message</button>
                </form>
            </div>
        </div>
    </div>
@stop
