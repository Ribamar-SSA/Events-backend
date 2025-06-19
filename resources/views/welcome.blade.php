@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto mt-8 p-4 bg-white shadow-lg rounded-lg">



    <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-6">Bem-vindo</h1>

    @if(session('msg'))
    <p class="text-green-600 text-center font-semibold mb-4">
        {{ session('msg') }}
    </p>
    @endif

    <div class="flex justify-center mb-6">
        <form action="{{ route('events.index') }}" method="GET" class="flex w-full max-w-md">
            <input
                type="text"
                name="search"
                placeholder="Buscar evento por título"
                class="flex-grow border-2 border-gray-300 p-2 rounded-l-lg focus:outline-none">
            <button type="submit" class="bg-blue-500 text-white px-4 rounded-r-lg hover:bg-blue-600">
                Buscar
            </button>
        </form>
    </div>




    @if(!empty($events) && count($events) > 0)
    <h2 class="text-2xl font-bold text-gray-700 mt-8 mb-4">Seus Eventos</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($events as $event)
        <div class="bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-blue-700">{{ $event->title }}</h3>
            <p class="text-gray-600 mt-2">Orador: {{ $event->speaker }}</p>
            <p class="text-gray-600 mt-2">localização: {{ $event->location }}</p>


            <div class="mt-4 flex flex-col gap-x-2">

                <img src="{{ asset($event->image ? 'storage/' . $event->image : 'storage/not_found.png') }}"
                    alt="{{ $event->title }}"
                    class="w-40 h-40 object-cover rounded-lg shadow-md">

                <div class="flex mt-4 gap-x-2">
                    @auth
                    @can('delete',$event)
                    <a href="{{ route('events.edit', ['id' => $event->id]) }}"
                        class="text-sm text-white bg-blue-500 hover:bg-yellow-600 px-3 py-1 rounded">
                        Editar
                    </a>
                    @endcan

                    @can('delete',$event)
                    <form action="{{ route('events.destroy', ['id' => $event->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-sm text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded"
                            onclick="return confirm('Tem certeza que deseja excluir este evento?')">
                            Excluir
                        </button>
                    </form>
                    @endcan

                    @endauth
                    <a href="{{ route('events.ver', ['id' => $event->id]) }}"
                        class="text-sm text-white bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded">
                        ver
                    </a>
                </div>
            </div>

        </div>
        @endforeach


        <div class="mt-4">
            {{ $events->onEachSide(1)->links() }}
        </div>


    </div>
    @else
    <p class="mt-8 text-gray-600 text-center">Você ainda não criou nenhum evento.</p>
    @endif

</div>
@endsection
