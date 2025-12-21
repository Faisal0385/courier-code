<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function AllPermission()
    {
        $permissions = Permission::all();
        return view('admin.pages.permission.all_permission', compact('permissions'));
    } // End Method 

    public function AddPermission()
    {
        return view('admin.pages.permission.add_permission');
    } // End Method 

    public function StorePermission(Request $request)
    {
        // 1️⃣ Create permission
        $permission = Permission::create([
            'name'       => $request->name,
            'group_name' => $request->group_name,
            'guard_name' => 'web', // VERY IMPORTANT
        ]);

        // 2️⃣ Assign permission to a model (User/Admin)
        $user = User::find(1); // Super Admin

        if ($user && !$user->hasPermissionTo($permission->name)) {
            $user->givePermissionTo($permission->name);
        }

        $notification = array(
            'success'    => 'Permission Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    } // End Method 


    public function EditPermission($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.pages.permission.edit_permission', compact('permission'));
    } // End Method 

    public function UpdatePermission(Request $request)
    {
        $per_id = $request->id;

        Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,

        ]);

        $notification = array(
            'success' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    } // End Method 


    public function DeletePermission($id)
    {
        Permission::findOrFail($id)->delete();

        $notification = array(
            'success' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 



    ///////////////////// All Roles ////////////////////



    public function AllRoles()
    {
        $roles = Role::all();
        return view('admin.pages.roles.all_roles', compact('roles'));
    } // End Method 

    public function AddRoles()
    {
        return view('admin.pages.roles.add_roles');
    } // End Method 

    public function StoreRoles(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'success'    => 'Roles Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    } // End Method 

    public function EditRoles($id)
    {
        $roles = Role::findOrFail($id);
        return view('admin.pages.roles.edit_roles', compact('roles'));
    } // End Method 


    public function UpdateRoles(Request $request)
    {
        $role_id = $request->id;

        Role::findOrFail($role_id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'success' => 'Roles Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    } // End Method 

    public function DeleteRoles($id)
    {
        Role::findOrFail($id)->delete();
        $notification = array(
            'success' => 'Roles Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 










    ///////////////// Add role Permission all method ///////////////
    public function AddRolesPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('admin.pages.roles.add_roles_permission', compact('roles', 'permissions', 'permission_groups'));
    } // End Method

    public function RolePermissionStore(Request $request)
    {
        $request->validate([
            'role_id'    => 'required|exists:roles,id',
            'permission' => 'required|array',
        ]);

        $role = Role::findOrFail($request->role_id);

        foreach ($request->permission as $permissionId) {
            $permission = Permission::find($permissionId);

            if ($permission && !$role->hasPermissionTo($permission->name)) {
                // 1️⃣ Assign to role
                $role->givePermissionTo($permission->name);

                // // 2️⃣ Assign to users of this role (model_has_permissions)
                // $users = User::role($role->name)->get();

                // foreach ($users as $user) {
                //     if (!$user->hasPermissionTo($permission->name)) {
                //         $user->givePermissionTo($permission->name);
                //     }
                // }
            }
        }

        return redirect()->route('all.roles.permission')->with([
            'success' => 'Role & User permissions added successfully',
        ]);
    }

    public function AllRolesPermission()
    {
        $roles = Role::all();
        return view('admin.pages.roles.all_roles_permission', compact('roles'));
    } // End Method 

    public function AdminRolesEdit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('admin.pages.roles.role_permission_edit', compact('role', 'permissions', 'permission_groups'));
    } // End Method 

    public function AdminRolesUpdate(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $permissions = $request->permission ?? [];

        if (!empty($permissions)) {
            $perms = Permission::whereIn('id', $permissions)->get();
            $role->syncPermissions($perms);
        } else {
            $role->syncPermissions([]); // remove all if none selected
        }

        $notification = array(
            'success' => 'Role Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);
    } // End Method 

    public function AdminRolesDelete($id)
    {
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 

}
