<?php

namespace App\Services;

use App\Repositories\Contracts\AdminUserRepoInterface;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserService
{
    protected $adminUserRepoInterface;

    public function __construct(AdminUserRepoInterface $adminUserRepoInterface)
    {
        $this->adminUserRepoInterface = $adminUserRepoInterface;
    }

    public function all()
    {
        return $this->adminUserRepoInterface->all();
    }

    public function create(array $data)
    {
        $record = $this->adminUserRepoInterface->create($data);
        return $record;
    }


    public function adminUserDataTable(Request $request)
    {
        $currentUserId = Auth::id();

        $query = $this->adminUserRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->editColumn('photo', function ($user) {
                return '<img src="' . $user->acsrImagePath . '" alt=""  class="rounded" width="70">';
            })
            ->editColumn('status', function ($user) use ($currentUserId) {
                if ($user->id === $currentUserId) {
                    return '<span class="badge badge-soft-success">Active</span>';
                }

                return '<span class="badge badge-soft-danger">Inactive</span>';
            })

            ->addColumn('action', function ($user) {
                return view('admin.backend.admin-user._action', compact('user'))->render();
            })
            ->rawColumns(['photo', 'status', 'action'])
            ->make(true);
    }

    public function userDataTable(Request $request)
    {
        $currentUserId = Auth::id();

        $query = $this->adminUserRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()
           
            ->editColumn('status', function ($user) use ($currentUserId) {
                if ($user->id === $currentUserId) {
                    return '<span class="badge badge-soft-success">Active</span>';
                }

                return '<span class="badge badge-soft-danger">Inactive</span>';
            })

            ->addColumn('action', function ($user) {
                return view('admin.backend.admin-user._action', compact('user'))->render();
            })
            ->rawColumns(['photo', 'status', 'action'])
            ->make(true);
    }


    public function update($id,array $data)
    {
        $record = $this->adminUserRepoInterface->find($id);
        $record->update($data);
        return $record;
    }

    

    public function delete($id)
    {
        $record = $this->adminUserRepoInterface->find($id);
        $record->delete();
    }
}
