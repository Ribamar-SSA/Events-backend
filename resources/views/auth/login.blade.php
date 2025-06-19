<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- Mantenha sua logo PNG/SVG aqui. Ajuste o h-[...]px no application-logo.blade.php --}}
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- --- CAMPO EMAIL --- --}}
            <div>
                <x-label for="email" value="{{ __('Email') }}" class="text-gray-700" /> {{-- Ajuste a cor do label --}}
                <x-input id="email" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            {{-- --- CAMPO SENHA --- --}}
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" class="text-gray-700" /> {{-- Ajuste a cor do label --}}
                <x-input id="password" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="password" name="password" required autocomplete="current-password" />
            </div>

            {{-- --- REMEMBER ME --- --}}
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    {{-- A cor do checkbox pode precisar de customização via Tailwind config ou CSS --}}
                    <x-checkbox id="remember_me" name="remember" class="form-checkbox text-indigo-600 shadow-sm focus:ring-indigo-500" />
                    <span class="ms-2 text-sm text-gray-700">{{ __('Remember me') }}</span> {{-- Ajuste a cor do texto --}}
                </label>
            </div>

            {{-- --- BOTÃO DE LOGIN E LINK DE RECUPERAÇÃO --- --}}
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-indigo-600 hover:text-indigo-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                {{-- O BOTÃO DE LOGIN --}}
                <x-button class="ms-4 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 focus:ring-indigo-500">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

        {{-- Adicione um link para a página de registro (se você tiver uma e quiser promover) --}}
        @if (Route::has('register'))
            <div class="mt-4 text-center text-sm text-gray-600">
                Ainda não tem conta? <a href="{{ route('register') }}" class="underline text-indigo-600 hover:text-indigo-900">Cadastre-se aqui</a>.
            </div>
        @endif

    </x-authentication-card>
</x-guest-layout>
