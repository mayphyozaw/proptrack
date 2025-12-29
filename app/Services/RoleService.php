<?php

namespace App\Services;

use App\Repositories\Contracts\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class RoleService
{
    protected $roleRepositoryInterface;

    public function __construct(RoleRepositoryInterface $roleRepositoryInterface)
    {
        $this->roleRepositoryInterface = $roleRepositoryInterface;
    }

    public function all()
    {
        return $this->roleRepositoryInterface->all();
    }

    public function create(array $data)
    {
        return $this->roleRepositoryInterface->create($data);
    }

    public function roleDatatable(Request $request)
    {
        $query = $this->roleRepositoryInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function ($role) {
                return view('admin.backend.role._action', compact('role'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function update($id,array $data)
    {
        $record = $this->roleRepositoryInterface->find($id);
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->roleRepositoryInterface->find($id);
        $record->delete();
    }
}
