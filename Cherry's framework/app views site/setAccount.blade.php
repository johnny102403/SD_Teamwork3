<!--app/views/site/setAccount.blade.php-->
@extends('site.layouts.default')

@section('content')
    <title>Setup account</title>
    <div class="container">
        {{<h1 class="text-center">Sign up</h1>}}
        <div class="form-group size">
            <label class="control-label col-sm-2">Account:</label>
            <div class="col-sm-10">
                <input class="user" id="setAc" type="text" class="form-control" name="account" placeholder="enter account" value="">
            </div>
            <br>
            <div class="form-group size">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10">
                    <input class="user" id="setPs" type="password" class="form-control" name="password" placeholder="enter password" value="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button id="setAcBtn" type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>

	{{ HTML::style('css/site/setup.css') }}
	<!--public/css/site-->
	{{ HTML::script('js/jquery.min.js') }}
	{{ HTML::script('js/setup.js') }}
	<!--public/js-->
@stop