<?php

/**
 * main Controller for sites:
 * index,create,show,edit,destroy,indexRefresh.blade.php
 *
 */

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;

use App\Http\Requests;
use App\Http\Requests\messageRequest;
use App\Http\Controllers\Controller;
use App\Message;
use Carbon\Carbon;


class MainController extends Controller
{

    /**
     *
     * authentication, only members can see all main sites.
     *
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * main index site, return user name and messages data to index.blade.php
     *
     * @return Response
     */
    public function index()
    {
        $name = \Auth::user();
        $messages = Message::latest()->get();
        return view('main.index', compact('messages','name'));
    }

    /**
     * refresh messages content
     *
     * return user name and messages data to indexRefresh.blade.php
     */
    public function indexRefresh()
    {
        $name = \Auth::user();
        $messages = Message::latest()->get();
        return view('main.indexRefresh', compact('messages','name'));
    }

    /**
     * Show the form for creating a new message.
     *
     * @return Response
     */
    public function create()
    {
        return view('main.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(messageRequest $request)
    {
        //$input = Request::get('content');
        //$input = $request->get('content');
        $input = $request->input('content');

        $messages = new Message;
        $messages->user_id = \Auth::user()->id;
        $messages->name = \Auth::user()->name;
        $messages->content = $input;
        $messages->time = Carbon::now('Asia/Taipei');
        $messages->save();

        // notification
        \Session::flash('flash_store', 'Your message has been added.');

        return redirect('main');
    }

    /**
     * Display the specified resource need to delete.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $messages = Message::findOrFail($id);
        if($messages->user_id === \Auth::user()->id){
            return view('main.show', compact('messages'));
        }

        // notification
        \Session::flash('flash_mod', 'Your can only modify your own message.');

        return redirect('main');
    }

    /**
     * Show the form for editing the specified message.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $messages = Message::findOrFail($id);

        if($messages->user_id === \Auth::user()->id){
            return view('main.edit', compact('messages'));
        }

        //notification
        \Session::flash('flash_mod', 'Your can only modify your own message.');

        return redirect('main');
    }

    /**
     * Update the specified resource in storage after.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(messageRequest $request, $id)
    {
        // $input = $request->get('content');
        $input = $request->input('content');
        $messages = Message::findOrFail($id);
        $messages->content = $input;
        $messages->save();

        //notification
        \Session::flash('flash_edit', 'Your message has been edited.');

        return redirect('main');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //$messages = Message::findOrFail($id);
        Message::destroy($id);

        //notification
        \Session::flash('flash_delete', 'Your message has been deleted.');

        return redirect('main');
    }
}
