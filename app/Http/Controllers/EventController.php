<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Event;


use function Laravel\Prompts\search;

class EventController extends Controller
{
    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = new Event;
        $event->title = $request->title;
        $event->speaker = $request->speaker;
        $event->description = $request->description;
        $event->event_date = $request->event_date;
        $event->location = $request->location;
        $event->capacity = $request->capacity;
        $event->is_public = $request->is_public;
        $event->category = $request->category;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('events', 'public');
            if (Storage::disk('public')->exists($imagePath)) {
                $event->image = $imagePath;
            } else {
            }
        }

        $event->user_id = auth()->id();
        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id); // busca o evento pelo ID

        return view('events.edit', ['event' => $event]); // envia o evento para a view
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $this->authorize('update', $event);

        $event->title = $request->title;
        $event->speaker = $request->speaker;
        $event->description = $request->description;
        $event->event_date = $request->event_date;
        $event->location = $request->location;
        $event->capacity = $request->capacity;
        $event->is_public = $request->is_public;
        $event->category = $request->category;


        $event->save();

        return redirect('/')->with('msg', 'Evento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $this->authorize('delete', $event);

        $event->delete();

        return redirect('/')->with('msg', 'Evento excluído com sucesso!');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');


        if ($search) {
            $events = Event::where('title', 'like', '%' . $search . '%')->paginate(6);
        } else {
            $events = Event::paginate(6);
        }

        return response()->json($events);
        // return view('welcome', compact('events', 'search'));
    }

    public function ver($id)
    {
        $event = Event::findOrFail($id);
        return view('events.ver', compact('event'));
    }
}
