<?php

namespace App\Http\Controllers;

use App\Models\Transducer;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listin of the resource.
     */
    public function index()
    {
        return Log::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'device_id' => 'required|exists:transducers,id',
            'value' => 'required|numeric',
            'max_value' => 'required|integer',
            'min_value' => 'required|integer',
        ]);

        $datalog = new Log();
        $datalog->device_id = $request->device_id;
        $datalog->value = $request->value;
        $datalog->max_value = $request->max_value;
        $datalog->min_value = $request->min_value;
        $datalog->save();

        if(Transducer::where('id', $request->device_id)->exists()){
            $transducer = Transducer::find($request->device_id);
            $transducer->save();
        }
        return response()->json(["message" => "Log Added."], 201);

    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(string $id)
    {
        return Log::where('device_id', $id)->orderby('created_at', 'DESC')->get();
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'device_id' => 'sometimes|required|exists:transducers,id',
            'value' => 'sometimes|required|numeric',
            'max_value' => 'sometimes|required|integer',
            'min_value' => 'sometimes|required|integer',
        ]);

        if (Log::where('id', $id)->exists()) {
            $transducer = Transducer::find($id);
            $datalog = Log::find($id);
            $datalog->update($request->all());
            $transducer->save();

            return response()->json(["message" => "Device updated."], 201);
        } else {
            return response()->json(["message" => "Device not found."], 404);
        }
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(string $id)
    {
        $datalog = Log::find($id);
        $datalog->delete();
        return response()->json(["message" => "Log deleted."], 201);
    }
}
