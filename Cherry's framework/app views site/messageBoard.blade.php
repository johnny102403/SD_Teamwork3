<!--app/views/site/messageBoard.blade.php-->
@extends('site.layouts.default')

@section('content')
<body data-spy="scroll" data-target=".navbar">

    <div class="header container-fluid text-center">
        {{<h1 class="h">Enjoy Your Chat Time!</h1>}}
    </div>

    <nav class="navbar navbar-inverse container-fluid" data-spy="affix" data-offset-top="200">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                       
            </button>
            <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home"></span>&nbspHome</a>
        </div>
       
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav ">
                <li><a href="#section1"><span class="glyphicon glyphicon-envelope"></span>&nbspMessage</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbspLog out</a></li>
            </ul>
        </div>
    </nav>    
    <div class="row">
        <div id="section1" class="container-fluid">
            <h1 class="text-center">Message Board</h1>
            <div class="message">
                <p id="disMs">Hello! Start chat with your friends.</p>
            </div>
            <form name="form1">
                <textarea id="content" name="content" class="form-control" rows="3" placeholder="Write a message"></textarea>
                <input id="sub" type="submit" class="btn btn-success" value="Enter">
            </form>
        </div>
    </div>
</body>
	{{ HTML::style('css/site/messageBoard.css') }}
	<!--Picture put in public/css/site-->
	{{ HTML::script('js/jquery.min.js') }}
	{{ HTML::script('js/jquery-ui.min.js') }}
	{{ HTML::script('js/submit.js') }}
	<!--public/js-->
@stop