<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
//    public function authenticate(): void
//    {
//        $this->ensureIsNotRateLimited();
//
//        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
//            RateLimiter::hit($this->throttleKey());
//
//            throw ValidationException::withMessages([
//                'email' => trans('auth.failed'),
//            ]);
//        }
//
//        RateLimiter::clear($this->throttleKey());
//    }
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        $credentials = $this->only('email', 'password');

        if (Auth::attempt($credentials, $this->boolean('remember'))) {
            // Check the user's status after successful login.
            $user = Auth::user();

            if ($user->status == 1) {
                RateLimiter::clear($this->throttleKey());
                // Redirect based on the user's role_id
                if ($user->role_id == 2) {
                    return redirect()->route('admin.index'); // Redirect to the dashboard for role_id 1.
                } elseif ($user->role_id == 1) {
                    return redirect()->route('dashboard'); // Redirect to the student profile for role_id 2.
                }
            } else {
                Auth::logout(); // Log the user out because their status is not 1.
//                session()->flash('error', 'We will let you know when you are Approved');
                throw ValidationException::withMessages([
                    'email' => 'Your account is not Approved Yet!',
                ]);
//                return redirect()->back();
            }
        }

        RateLimiter::hit($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }



    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }
}
