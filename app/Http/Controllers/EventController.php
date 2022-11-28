<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {

        $search = request('search');
        if($search)
        {
            $events = Event::where([
                ['title', 'like', '%' .  str_replace(' ', '%', $search) . '%' ]
            ])->get();
        }else
        {
            $events = Event::all();
        }
        return view('welcome',
            [
                'events' => $events, 'search' => $search
            ]);

    }

    public function create()
    {

        $events = Event::all();

        return view('events.create',
        [
            'events' => $events
        ]);
    }

    public function store(Request $request)
    {
        $event = new Event;

        $event->title = $request->title;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->private = $request->private;
        $event->date_event = $request->date_event;
        $event->image = $request->image;
        $event->items = $request->items;

        //upload Image
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->image;
            $extension = $image->extension();
            $imageName = md5($image->getClientOriginalName().strtotime("now")).'.'.$extension;
            $request->image->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }
        $user = auth()->user();
        $event->user_id = $user->id;
        $event->save();
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {
        $event =  Event::findOrFail($id);
        $eventOwner = User::where('id', $event->user_id)->first();
        $name = ucfirst(strtolower(explode( ' ', $eventOwner->name)[0]));
        $eventOwner->nameS = $name;
        return view("events.show",
            [
                'event' => $event, 'eventOwner' => $eventOwner
            ]);
    }

    public function dashboard(){
        $user = auth()->user();
        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', "Evento excluído com sucesso!");
    }

}
