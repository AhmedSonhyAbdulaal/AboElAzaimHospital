<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkShop\Store;
use App\Http\Requests\WorkShop\Update;
use App\Http\Resources\WorkShop\Index;
use App\Models\WorkShop;
use Exception;
use Illuminate\Http\Request;

class WorkShopController extends Controller
{
    public function index ()
    {
        return response()->json([
            'date' => Index::collection(WorkShop::all(['name'])),
        ],200);
    }

    public function store (Store $request)
    {
        try {
            WorkShop::create($request->validated());
            return response()->json(['data' => 'created successfully.'],200);
        } catch (Exception $e) {
            return response()->json(['data' => 'can not create this nationality.'],422);
        }
    }

    public function update(Update $request , WorkShop $workShop)
    {
        try {
            $workShop->update($request->validated());
            return response()->json(['data' => 'updated successfully.'],200);
        } catch (Exception $e) {
            return response()->json(['data' => 'can not update this workShop.'],422);
        }
    }
    public function distroy(WorkShop $workShop)
    {
        try {
            $workShop->delete();
            return response()->json(['data' => 'deleted successfully.'],200);
        } catch (Exception $e) {
            return response()->json(['data' => 'can not delete this workShop.'],422);
        }
    }
}
