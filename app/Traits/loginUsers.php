<?php namespace app\Traits;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait loginUsers
{ 
    public function showLoginTutorsForm()
    {
        return view('auth.loginTutors');
    }

    public function showLoginClientsForm()
    {
        return view('auth.loginClients');
    }

    public function showLoginEmployeeForm()
    {
        return view('auth.loginEmployees');
    }

    public function loginClients(Request $request)
    {
        $this->validateLoginClients($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLoginClients($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLoginClients(Request $request)
    {
        $request->validate([
            $this->usernameClients() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function attemptLoginClients(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentialsClients($request), $request->filled('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentialsClients(Request $request)
    {
        return $request->only($this->usernameClients(), 'password');
    }

    public function usernameClients()
    {
        return 'u_nickname';
    }

}
