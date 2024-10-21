<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Enums\ViewPath\Admin\Auth;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use App\Services\AdminService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends BaseController
{
    public function __construct(
        private readonly AdminService $adminService,
        private readonly Admin $admin,
    )
    {

    }

    public function index(?Request $request, string $type = null): View|Collection|LengthAwarePaginator|null|callable|RedirectResponse
    {
        return $this->getView();
    }

    protected function getView():View
    {

        return view(Auth::ADMIN_LOGIN);
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $admin = $this->admin->where('email', $request['email'])->first();
        if (isset($admin)) {
            if ($this->adminService->isLoginSuccessful($request['email'], $request['password'])) {
                return redirect()->route('admin.dashboard.index');
            }
        }
        flash()->warning('credentials not matched!!!!!');
        return redirect()->back()->withInput($request->only('email','password'));
    }

    public function logout(): RedirectResponse
    {
        $this->adminService->logout();
        flash()->success('logged out successfully');
        return redirect(RouteServiceProvider::LOGIN);
    }

}
