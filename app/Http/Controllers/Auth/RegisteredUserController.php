<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     * Purpose: This method returns the registration view (form) for users to enter their details.
     * Return Type: It returns a View, specifically auth.register, which is the Blade template for the registration form.
     * Usage: When a user accesses the /register route (via GET), this method is called to show the registration form.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     * Purpose: This method processes the registration form when the user submits it.
     * Parameter: It takes an instance of Request which contains the form data.
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        /**
         * A new User record is created in the database using the User::create method.
         * Hash::make($request->password): This securely hashes the password before storing it in the database.
         */
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        /**
         * This line triggers the Registered event, which is typically used for additional actions like sending a verification email to the user after they register.
         */
        event(new Registered($user));

        /**
         * The newly registered user is automatically logged in using Auth::login($user), so they do not need to log in manually after registration.
         */
        Auth::login($user);

        /**
         * the user is redirected to the dashboard route.
         * route('dashboard', absolute: false): This generates a relative URL for the dashboard route.
         * RedirectResponse: The method returns a redirect response to take the user to the specified page (e.g., the user dashboard).
         */
        return redirect(route('dashboard', absolute: false));
    }
}
