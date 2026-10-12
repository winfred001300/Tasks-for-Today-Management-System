<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        // Display the login page.
        return view('login');
    }

    public function login()
    {
        // Get the submitted login details.
        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');

        // Find the account by username.
        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        // Verify the submitted password against the stored hash.
        if (
            $user !== null &&
            ! empty($user['password']) &&
            password_verify($password, $user['password'])
        ) {
            // Create a fresh session after successful login.
            session()->regenerate(true);

            session()->set([
                'isLoggedIn' => true,
                'userId'     => $user['id'],
                'username'   => $user['username'],
            ]);

            // Redirect to the Welcome page.
            return redirect()->to(base_url('home/view'));
        }

        // Return to login if the credentials are invalid.
        return redirect()->to(base_url('login'))
            ->withInput()
            ->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        // Clear the current session.
        session()->destroy();

        // Return to the login page.
        return redirect()->to(base_url('login?logged_out=1'));
    }
}
