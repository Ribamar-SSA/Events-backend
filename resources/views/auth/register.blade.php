<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- Mantenha sua logo PNG/SVG aqui. Ajuste o h-[...]px no application-logo.blade.php --}}
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- --- CAMPO NOME --- --}}
            <div>
                <x-label for="name" value="{{ __('Name') }}" class="text-gray-700" /> {{-- Ajuste a cor do label --}}
                <x-input id="name" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            {{-- --- CAMPO EMAIL --- --}}
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" class="text-gray-700" /> {{-- Ajuste a cor do label --}}
                <x-input id="email" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            {{-- --- CAMPO SENHA --- --}}
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" class="text-gray-700" /> {{-- Ajuste a cor do label --}}
                <x-input id="password" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="password" name="password" required autocomplete="new-password" />
            </div>

            {{-- --- CAMPO CONFIRMAR SENHA --- --}}
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-gray-700" /> {{-- Ajuste a cor do label --}}
                <x-input id="password_confirmation" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            {{-- --- TERMOS DE SERVIÇO E POLÍTICA DE PRIVACIDADE --- --}}
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            {{-- A cor do checkbox pode precisar de customização via Tailwind config ou CSS --}}
                            <x-checkbox name="terms" id="terms" required class="form-checkbox text-indigo-600 shadow-sm focus:ring-indigo-500" />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-indigo-600 hover:text-indigo-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-indigo-600 hover:text-indigo-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            {{-- --- BOTÃO DE REGISTRO E LINK DE LOGIN --- --}}
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-indigo-600 hover:text-indigo-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 focus:ring-indigo-500">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
