<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUser\AdminUserStoreRequest;
use App\Http\Requests\AdminUser\AdminUserUpdateRequest;
use App\Models\User;
use App\Services\AdminUserService;
use App\Services\ResponseService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminUserController extends Controller
{
    protected $adminUserService;

    public function __construct(AdminUserService $adminUserService)
    {
        $this->adminUserService = $adminUserService;
    }

    public function index()
    {
        $currentUser = Auth::user();
        $users = User::all();
        return view('admin.backend.admin-user.index', compact('currentUser', 'users'));
    }

    public function create()
    {
        return view('admin.backend.admin-user.create');
    }

    public function adminUserDatatable(Request $request)
    {
        return $this->adminUserService->adminUserDatatable($request);
    }

    public function store(AdminUserStoreRequest $request)
    {

        $user_img_name = null;
        if ($request->hasFile('photo')) {
            $user_img_file = $request->file('photo');
            $user_img_name = uniqid() . '_' . time() . '.' . $user_img_file->getClientOriginalExtension();
            $user_img_file->move(public_path('/upload/user_images'), $user_img_name);
        }


        try {
            $this->adminUserService->create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => Hash::make($request->password),
                'photo' => $user_img_name,
                'status' => 'active',

            ]);

            return redirect()->route('admin-user.index')
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
        $user = User::findOrFail($id);
        return view('admin.backend.admin-user.edit', compact('user'));
    }

    public function update(AdminUserUpdateRequest $request, $id)
    {
        
        $user = User::findOrFail($id);
       
        $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        if ($request->filled('password')) {
            $user_data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            if ($user->photo && file_exists(public_path('upload/user_images/' . $user->photo))) {
                unlink(public_path('upload/user_images/' . $user->photo));
            }

            $user_img_file = $request->file('photo');
            $user_img_name = uniqid() . '_' . time() . '.' . $user_img_file->getClientOriginalExtension();
            $user_img_file->move(public_path('/upload/user_images'), $user_img_name);

            $user_data['photo'] = $user_img_name;
        }

        try {
            $this->adminUserService->update($id, $user_data);

            return redirect()->route('admin-user.index')
                ->with('message', 'Successfully updated')
                ->with('alert-type', 'success');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }
    public function destroy($id)
    {
        try {
            $this->adminUserService->delete($id);

            return ResponseService::success([], 'Successfully deleted');
        } catch (Exception $e) {
            return ResponseService::fail($e->getMessage());
        }
    }
}
