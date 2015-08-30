<!-- refresh content of index page -->

@foreach($messages as $message)
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
<script type="text/javascript" src="{{ URL::to('js/main.js') }}"></script>
