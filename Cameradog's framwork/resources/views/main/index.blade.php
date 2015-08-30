<!-- main idex page to show all messages -->

@extends('layouts.default')

@section('title', 'ChatRoom')

@section('content')
    <div class="row">
        <div id="section1" class="container-fluid">
            <h1 id='titleText' class="text-center">Welcome {{ $name->name }}</h1>
            <button id="newMs" class="btn btn-primary" value="">New Message</button>

            <!-- show messages -->
            <div class="message">
                @foreach($messages as $message)
                    <!-- user's own messages -->
                    @if( $name->id === $message->user_id)
                      <div class="allFont owner">
                          <span class='userFont'>{{$message->name}}</span>
                          <p class='contentFont'>{{$message->content}}</p>
                          <div class='msBtn'>
                            <p class='timeFont'>{{$message->time}}</p>
                            <button class="deleteBtn btn btn-danger" value="{{ $message->id }}">delete</button>
                            <button class="editBtn btn btn-info" value="{{ $message->id }}">edit</button>
                          </div>
                      </div>
                    <!-- other users' messages -->
                    @else
                      <div class="allFont">
                          <span class='userFont'>{{$message->name}}</span>
                          <p class='contentFont'>{{$message->content}}</p>
                          <div class='msBtn'>
                            <p class='timeFont'>{{$message->time}}</p>
                            <button class="deleteBtn btn btn-danger" value="{{ $message->id }}">delete</button>
                            <button class="editBtn btn btn-info" value="{{ $message->id }}">edit</button>
                          </div>
                      </div>
                    @endif
                @endforeach
            </div>
            <!-- <form name="form1">
                <textarea id="content" name="content" class="form-control" rows="3" placeholder="Write a message"></textarea>
                <input id="sub" type="submit" class="btn btn-success" value="Enter">
            </form> -->
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::to('js/refreshContent.js') }}"></script>
@stop
