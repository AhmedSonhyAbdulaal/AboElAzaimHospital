<?php

namespace App\Http\Controllers;

use App\Http\Requests\Nationality\Store;
use App\Http\Requests\Nationality\Update;
use App\Http\Resources\Nationality\Index;
use App\Models\Nationality;
use Exception;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
    public function index ()
    {
        return response()->json([
            'date' => Index::collection(Nationality::all(['nation'])),
        ],200);
    }

    public function store (Store $request)
    {
        try {
            Nationality::create(['nation'=>$request->validated()['nationality']]);
            return response()->json(['data' => 'created successfully.'],200);
        } catch (Exception $e) {
            return response()->json(['data' => 'can not create this nationality.'],422);
        }
    }

    public function update(Update $request , Nationality $nation)
    {dd('s');
        try {
            $nation->update(['nation'=>$request->validated()['nationality']]);
            return response()->json(['data' => 'updated successfully.'],200);
        } catch (Exception $e) {
            return response()->json(['data' => 'can not update this nationality.'],422);
        }
    }
    public function distroy(Nationality $nation)
    {
        try {
        $nation->delete();
            return response()->json(['data' => 'deleted successfully.'],200);
        } catch (Exception $e) {
            return response()->json(['data' => 'can not delete this nationality.'],422);
        }
    }
}
