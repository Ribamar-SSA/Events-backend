<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <main>
        <nav class="bg-gray-800 p-4 text-white">
            <div class="container mx-auto flex justify-between items-center">
                {{-- Logo / Título --}}
                <a href="{{ route('welcome') }}" class="text-xl font-bold hover:text-gray-300">
                    Plympa
                </a>

                {{-- Links e saudação --}}
                <div class="flex items-center space-x-6">
                    {{-- Link fixo para Eventos --}}
                    <a href="{{ route('events.index') }}" class="hover:text-gray-300">Eventos</a>

                    @auth

                    <a href="{{ route('events.create') }}" class="hover:text-gray-300">
                        Criar Evento
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-red-400">
                            Logout
                        </button>
                    </form>


                    <span class="text-sm md:text-base">
                        Olá, <span class="font-medium">{{ auth()->user()->name }}</span>!
                    </span>
                    @else
                    <a href="{{ route('login') }}" class="hover:text-gray-300">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-gray-300">Registrar</a>
                    @endauth
                </div>
            </div>
        </nav>



        @yield('content')
    </main>
</body>

</html>
