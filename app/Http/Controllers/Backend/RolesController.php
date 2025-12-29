<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleStoreRequest;
use App\Http\Requests\Role\RoleUpdateRequest;
use App\Services\ResponseService;
use App\Services\RoleService;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {

        // $roles = Role::all();
        return view('admin.backend.role.index');
    }

    public function create()
    {
        return view('admin.backend.role.create');
    }


    public function roleDatatable(Request $request)
    {
        return $this->roleService->roleDatatable($request);
    }



    public function store(RoleStoreRequest $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        try {
            $role = $this->roleService->create([
                'name' => $request->name,
            ]);

            // $role->givePermissionTo($request->permission);

            return redirect()->route('role.index')
                ->with([
                    'message' => 'Successfully created',
                    'alert-type' => 'success'
                ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.backend.role.edit', compact('role'));
    }

    public function update(RoleUpdateRequest $request, $id)
    {
        try {
            $role = $this->roleService->update($id, [
                'name' => $request->name,
            ]);

            // $role->givePermissionTo($request->permission);

            return redirect()->route('role.index')
                ->with([
                    'message' => 'Successfully updated',
                    'alert-type' => 'success'
                ]);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        // $role = $this->roleService->delete($id);
        try {
            $this->roleService->delete($id);

            return ResponseService::success([], 'Successfully deleted');
        } catch (Exception $e) {
            return ResponseService::fail($e->getMessage());
        }
    }
}
