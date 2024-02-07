<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Http\Requests\StoreeventRequest;
use App\Http\Requests\UpdateeventRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\tag;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = event::all();
        $tags = tag::all();

        return view('admin.events.index', compact('events', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event, tag $tag)
    {
        $events = event::all();
        $tags = tag::all();
        return view('admin.events.create', compact('event', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreeventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreeventRequest $request)
    {

        $dati_validi = $request->validated();

        $new_event = new Event();
        $new_event->fill($dati_validi);
        $new_event->save();

        return redirect()->route('admin.event.index');
    }


    public function show(event $event)
    {
        $events = event::all();
        return view('admin.events.show', compact("event"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        $events = event::all();
        $tags = tag::all();
        return view('admin.events.edit', compact('event', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateeventRequest  $request
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateeventRequest $request, event $event)
    {
        $data =  $request->validated();
        if ($request->tags) {
            $event->tags()->sync($request->tags);
        }
        $event->update($data);
        return redirect()->route('admin.event.show', $event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
    {
        $event->delete();
        return redirect()->route('admin.event.index');
    }
}
