<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AdminUserService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $adminUserService;

    public function __construct(AdminUserService $adminUserService)
    {
        $this->adminUserService = $adminUserService;
    }

    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.index',compact('users'));
    }

    public function userDatatable(Request $request)
    {
        return $this->adminUserService->userDatatable($request);
    }

    
}
