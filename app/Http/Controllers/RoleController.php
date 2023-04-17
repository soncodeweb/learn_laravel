<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    function show()
    {
        # ELOQUENT ORM - SELECT MANY TO MANY
        // $users = Role::find(4)->users; // lấy danh sách các user có role với id = 4
        // return $users;

        # ELOQUENT ORM - SELECT MANY TO MANY
        $roles = User::find(3)->roles; // lấy danh sách các role có user với id = 3
        return $roles;
    }
}
