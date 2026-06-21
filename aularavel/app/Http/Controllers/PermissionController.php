<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    public static function loadPermissions($role) {
        $arr_permissions = Array();
        $perm = Permission::with(['resource'])->where('role_id', $role)->get();
        foreach($perm as $item) {
            if ($item->permission == 1) {
                $arr_permissions[$item->resource->name] = true;
            } else {
                $arr_permissions[$item->resource->name] = false;
            }
        }
        // dd($arr_permissions);
        session(['user_permissions' => $arr_permissions]);
    }
    public static function isAuthorized($resource) {
        $permissions = session('user_permissions');
        
        if(array_key_exists($resource, $permissions)) {
            return $permissions[$resource];
        }
        return false;
    }
}
