<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events.index')->with('events',Event::orderBy('created_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $validatedBody = $request->validate([
            'title' => 'required|min:5|string',
            'description' => 'required|min:5|string',
            'freemium' => 'required|boolean',
            'activeDate' => 'required|date'
        ]);

        Event::create([
            'title' => $validatedBody['title'],
            'description' => $validatedBody['description'],
            'freemium' => $validatedBody['freemium'],
            'activeDate' => $validatedBody['activeDate'],
            'createdBy' => Auth::id()
        ]);

        return redirect('/events');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {

        $validatedBody = $request->validate([
            'title' => 'required|min:5|string',
            'description' => 'required|min:5|string',
            'freemium' => 'required|boolean',
            'activeDate' => 'required|date',
            'isActive' => 'required|boolean',
        ]);

        $event->update($validatedBody);

        return redirect(route('events.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect(route('events.index'));
    }
}
