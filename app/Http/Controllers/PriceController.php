<?php

namespace App\Http\Controllers;

use App\Http\Requests\Price\Store;
use App\Http\Requests\Price\Update;
use App\Http\Resources\Price\Index;
use App\Models\Price;
use Exception;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        return response()->json([
            'date' => Index::collection(Price::all(['id','price', 'symbol', 'currancy'])),
        ],200);
    }
    public function store(Store $request)
    {
        try {
            Price::create($request->validated());
            return response()->json(['data' => 'created successfully.'],200);
        } catch (Exception $e) {
            return response()->json(['data' => 'can not create this price.'],422);
        }
    }
    public function update(Update $request , Price $price)
    {
        try {
            $price->update($request->validated());
            return response()->json(['data' => 'updated successfully.'],200);
        } catch (Exception $e) {
            return response()->json(['data' => 'can not update this price.'],422);
        }
    }
    public function delete(Price $price)
    {
        try {
            $price->delete();
            return response()->json(['data' => 'deleted successfully.'],200);
        } catch (Exception $e) {
            return response()->json(['data' => 'can not delete this price.'],422);
        }
    }
}
