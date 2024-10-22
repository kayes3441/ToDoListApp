<?php

namespace App\Http\Controllers\Admin;

use App\Enums\GlobalConstant;
use App\Enums\ViewPath\Admin\Dashboard;
use App\Http\Controllers\BaseController;
use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends BaseController
{
    public function __construct(
        private readonly Task    $task,
    )
    {

    }
    public function index(?Request $request, string $type = null): View|Collection|LengthAwarePaginator|null|callable|RedirectResponse
    {
        return $this->getView();

    }
    protected function getView(): View
    {
        $id = auth('admins')->id();
        $tasks = $this->task->where('assign_to',$id)
            ->orderByRaw('CASE WHEN status = 0 THEN priority END DESC')
            ->orderBy('status')->simplePaginate(GlobalConstant::PAGINATE_LENGTH);
        $totalTask = $this->task->where('assign_to',$id)->count();
        $pendingTask = $this->task->where('assign_to',$id)->where('status',0)->count();
        $completeTask = $this->task->where('assign_to',$id)->where('status',1)->count();
        return view(Dashboard::INDEX[VIEW],compact('tasks','totalTask','pendingTask','completeTask'));
    }
}
