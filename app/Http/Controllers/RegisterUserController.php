<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Validation\Rules\File;
    use Illuminate\Validation\Rules\Password;

    class RegisterUserController extends Controller
    {

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view('auth.register');
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $userAttributes = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'confirmed', Password::min(8)],
            ]);

            $employerAttributes = $request->validate([
                'employer' => ['required', 'string', 'max:255'],
                'logo' => ['required', File::types(['png', 'jpg', 'jpeg'])],
            ]);

            $logoPath = $request->logo->store('logos');

            $user = User::create($userAttributes);

            $user->employer()->create([
                'name' => $employerAttributes['employer'],
                'logo' => $logoPath,
            ]);

            Auth::login($user);

            return redirect('/');
        }
    }