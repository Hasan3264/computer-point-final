<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class RoleManagementController extends Controller
{

   function role_manage(){
    $roles = Role::all();
    $parmission = Permission::all();
    $users = User::all();
     return view('admin.role.index',[
        'parmissions'=> $parmission,
        'roles'=>$roles,
        'users'=>$users,
     ]);
   }
   function add_parmission(Request $requset){
     $permission = Permission::create(['name' => $requset->parmission_name]);
     return back();
   }
   function add_role(Request $requset){
    $role = Role::create(['name' => $requset->role_name]);
    $role->givePermissionTo($requset->parmission);
     return back();
   }
   function assign_role(Request $requset){
    $user = User::find($requset->user_id);
    $user->assignRole($requset->role_id);
     return back();
   }
   function edit_permition($user_id){
    $parmissions = Permission::all();
    $user_info = User::find($user_id);
    return view('admin.role.edit',[
      'parmissions'=>$parmissions,
      'user_info'=>$user_info,
    ]);
  }
  function update_permition(Request $requset){
     $user = User::find($requset->user_id);
     $user->syncPermissions($requset->parmission);
     return back();

   }

     
}
