<?php

namespace App\Services;

class AdminService
{
    public function isLoginSuccessful(string $email, string $password): bool
    {
        if (auth('admin')->attempt(['email' => $email, 'password' => $password])) {
            return true;
        }
        return false;
    }

    public function logout(): void
    {
        auth('admin')->logout();
        session()->invalidate();
    }

}
