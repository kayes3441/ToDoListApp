<?php

namespace App\Http\Controllers\Admin;

use App\Enums\GlobalConstant;
use App\Enums\ViewPath\Admin\EmployeeEnum;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\EmployeeAddRequest;
use App\Http\Requests\Admin\EmployeeUpdateRequest;
use App\Models\Admin;
use App\Models\AdminRole;
use App\Services\AdminService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends BaseController
{
    public function __construct(
        private readonly AdminService $employeeService,
        private readonly Admin       $employee,
        private readonly AdminRole       $adminRole,
    )
    {

    }

    public function index(?Request $request, string $type = null): View|Collection|LengthAwarePaginator|null|callable|RedirectResponse
    {
        return $this->getAddView();
    }

    protected function getAddView():view
    {
        return view(EmployeeEnum::INDEX[VIEW]);
    }

    public function add(EmployeeAddRequest $request):RedirectResponse
    {
        $adminRole = $this->adminRole->create($this->employeeService->getAdminRoleData(request: $request));
        $this->employee->create($this->employeeService->getAddData(request:$request,roleId: $adminRole->id));
        Toastr::success('Added Successfully');
        return redirect()->back();
    }

    public function getList(): View
    {
        $allEmployee = $this->employee->with('role')
            ->where('id','!=','1')
            ->orderBy('id','desc')
            ->simplePaginate(GlobalConstant::PAGINATE_LENGTH);

        return view(EmployeeEnum::LIST[VIEW],compact('allEmployee'));
    }
    public function getUpdateView($id):View
    {
        $employee = $this->employee->with('role')->where('id',$id)->first();
        return view(EmployeeEnum::UPDATE[VIEW],compact('employee'));
    }

    public function update(EmployeeUpdateRequest $request, $id):RedirectResponse
    {
        $employee = $this->employee->find($id);
        $employee->update($this->employeeService->getUpdateData(request:$request));
        $this->adminRole->find($employee->admin_role_id)->update($this->employeeService->getAdminRoleUpdateData(request: $request));
        Toastr::success('Update Successfully');
        return redirect()->back();
    }

    public function delete($id): RedirectResponse
    {
        $employee =  $this->employee->where('id',$id)->first();
        $this->adminRole->where('id',$employee->admin_role_id)->delete();
        $employee->delete();
        Toastr::success('Delete Successfully');
        return redirect()->back();
    }
}
