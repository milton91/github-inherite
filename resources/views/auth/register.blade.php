<x-guest-layout> <!-- x-guest-layout: Basic guest lyout for guest (Unathenticated User)-->
    <form method="POST" action="{{ route('register') }}"> <!-- method="POST" specifies that this form will send a POST request -->
        @csrf <!-- This is a Blade directive to include CRSF (Cross-Site Request Forgery)
                   token in the form. Laravel requires this for security againts CSRF attacks -->

        <!-- Name -->
        <div>
            <!-- Custom Blade component for the label element -->
            <x-input-label for="name" :value="__('Name')" /> <!-- Custome Blade components for the label element -->
            <!-- Custom Blade component for input element
                id = "name"         Set the input field's ID
                type = "text"       Specifies the input type
                name = "name"       Sets the input name, which is the key sent to the server
                - "old('name')"     Set the input value to the previously entered value if validation fails, helping retain user input
                required            Makes the input field mandatory
                autofocus           Automatically focus on this input field when the form loads
                autocomplete="name" Provides browser autofill suggestion for names
            -->
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            
            <!-- x-input-error: Display validation error messages for the name field if there are any. It checks $errors->get('name') -->
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
