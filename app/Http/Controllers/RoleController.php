<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleType\Store;
use App\Http\Requests\RoleType\Update;
use App\Http\Resources\RoleType\Index;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index ()
    {
        return response()->json([
            'date' => Index::collection(Role::all(['role_type'])),
        ],200);
    }

    public function store (Store $request)
    {
        try {
            Role::create($request->validated());
            return response()->json(['data' => 'created successfully.'],200);
        } catch (Exception $e) {
            return response()->json(['data' => 'can not create this role type.'],422);
        }
    }

    public function update(Update $request , Role $roleType)
    {
        try {
            $roleType->update($request->validated());
            return response()->json(['data' => 'updated successfully.'],200);
        } catch (Exception $e) {
            return response()->json(['data' => 'can not update this role type.'],422);
        }
    }
    public function delete(Role $roleType)
    {
        try {
            $roleType->delete();
            return response()->json(['data' => 'deleted successfully.'],200);
        } catch (Exception $e) {
            return response()->json(['data' => 'can not delete this role type.'],422);
        }
    }
}
