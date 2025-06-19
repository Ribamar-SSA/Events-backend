@extends('layouts.main')

@section('title', $event->title)

@section('content')
<div class="max-w-4xl mx-auto mt-8 p-6 bg-white rounded shadow">
    <h1 class="text-3xl font-bold mb-4">{{ $event->title }}</h1>

    @if ($event->image)
        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}"
             class="w-full h-full object-cover rounded mb-4">
    @else
        <img src="{{ asset('storage/not_found.png') }}" alt="Imagem padrão"
             class="w-full h-64 object-cover rounded mb-4">
    @endif

    <p><strong>Orador:</strong> {{ $event->speaker }}</p>
    <p><strong>Data do Evento:</strong> {{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y') }}</p>
    <p><strong>Localização:</strong> {{ $event->location }}</p>
    <p><strong>Capacidade:</strong> {{ $event->capacity }}</p>
    <p><strong>Categoria:</strong> {{ $event->category }}</p>
    <p><strong>Descrição:</strong></p>
    <p class="mt-2 text-gray-700">{{ $event->description }}</p>

    <a href="{{ route('events.index') }}"
       class="inline-block mt-6 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Voltar</a>
</div>
@endsection
