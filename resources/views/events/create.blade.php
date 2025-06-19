@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')
<div class="container mx-auto mt-8 p-4">
    <h1 class="text-3xl font-bold mb-6 text-center">Crie o seu evento</h1>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <!-- Título -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
            <input type="text" id="title" name="title" placeholder="Título do evento"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Orador -->
        <div class="mb-4">
            <label for="speaker" class="block text-gray-700 text-sm font-bold mb-2">Orador:</label>
            <input type="text" id="speaker" name="speaker" placeholder="Nome do orador"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <!-- Descrição -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descrição:</label>
            <textarea id="description" name="description" placeholder="Descrição do evento"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 h-24 resize-none"></textarea>
        </div>

        <!-- Data do Evento -->
        <div class="mb-4">
            <label for="event_date" class="block text-gray-700 text-sm font-bold mb-2">Data e Hora:</label>
            <input type="datetime-local" id="event_date" name="event_date"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <!-- Local -->
        <div class="mb-4">
            <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Local:</label>
            <input type="text" id="location" name="location" placeholder="Local do evento"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <!-- Capacidade -->
        <div class="mb-4">
            <label for="capacity" class="block text-gray-700 text-sm font-bold mb-2">Capacidade:</label>
            <input type="number" id="capacity" name="capacity" placeholder="Número de vagas"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <!-- Evento Público -->
        <div class="mb-4">
            <label for="is_public" class="block text-gray-700 text-sm font-bold mb-2">Evento Público?</label>
            <select id="is_public" name="is_public" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                <option value="1" selected>Sim</option>
                <option value="0">Não</option>
            </select>
        </div>

        <!-- Categoria -->
        <div class="mb-4">
            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Categoria:</label>
            <input type="text" id="category" name="category" placeholder="Ex: Tecnologia, Negócios..."
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <!-- Imagem -->
        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Imagem do Evento:</label>
            <input type="file" id="image" name="image"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <!-- Botão -->
        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Salvar
            </button>
        </div>
    </form>
</div>
@endsection
