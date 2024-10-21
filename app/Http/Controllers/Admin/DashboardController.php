<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ViewPath\Admin\Dashboard;
use App\Http\Controllers\BaseController;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends BaseController
{
    //
    public function index(?Request $request, string $type = null): View|Collection|LengthAwarePaginator|null|callable|RedirectResponse
    {
        return $this->getView();

    }
    protected function getView(): View
    {
        $trending_news = 0;
        $featured_news = 1;
        $news_count =3;
        return view(Dashboard::DASHBOARD_VIEW,compact('trending_news','featured_news','news_count'));
    }
}
