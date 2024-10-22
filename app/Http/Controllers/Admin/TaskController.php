<?php

namespace App\Http\Controllers\Admin;

use App\Enums\GlobalConstant;
use App\Enums\ViewPath\Admin\TaskEnum;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\TaskAddUpdateRequest;
use App\Models\Admin;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Brian2694\Toastr\Facades\Toastr ;

class TaskController extends BaseController
{
    public function __construct(
        private readonly TaskService $taskService,
        private readonly Admin       $admin,
        private readonly Task    $task,
    )
    {

    }
    public function index(?Request $request, string $type = null): View|Collection|LengthAwarePaginator|null|callable|RedirectResponse
    {
       return $this->getAddView();
    }
    protected function getAddView():view
    {
        $allEmployee = $this->admin->all();
        return view(TaskEnum::INDEX[VIEW],compact('allEmployee'));
    }

    public function add(TaskAddUpdateRequest $request):RedirectResponse
    {
        $this->task->create($this->taskService->getAddUpdateData(request:$request));
        Toastr::success('Added Successfully');

        return redirect()->back();
    }

    public function getList(Request $request,$status): View
    {
        $search = $request['search'] ?? null;
        $tasks = $this->task->with('assignTo')
            ->when($search, function ($query) use($search){
                $query->Where('title', 'like', "%".$search."%");
            })->when($status == 'pending', function ($query) {
               return $query->where('status',0);
            })->when($status == 'complete', function ($query) {
                    return $query->where('status',1);
            })
            ->orderBy('id','desc')
            ->simplePaginate(GlobalConstant::PAGINATE_LENGTH);

        return view(TaskEnum::LIST[VIEW],compact('tasks'));
    }
    public function getUpdateView($id):View
    {
        $allEmployee = $this->admin->all();
        $task = $this->task->with('assignTo')->where('id',$id)->first();
        return view(TaskEnum::UPDATE[VIEW],compact('task','allEmployee'));
    }

    public function update(TaskAddUpdateRequest $request, $id):RedirectResponse
    {
        $this->task->find($id)->update($this->taskService->getAddUpdateData(request:$request));
        Toastr::success('Update Successfully');
        return redirect()->back();
    }

    public function delete($id): RedirectResponse
    {
        $this->task->where('id',$id)->delete();
        Toastr::success('Delete Successfully');
        return redirect()->back();
    }

}
