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
        $logs = Log::paginate(10); // atau Log::all();
        return view('logs', compact('logs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
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

        return response()->json(["message" => "Log Added."], 201);
    }


    // /**
    //  * Display the specified resource.
    //  */
    public function show(string $id)
    {
        return Log::find($id);
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'device_id' => 'sometimes|required|exists:transducers,id',
            'value' => 'sometimes|required|integer',
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
    public function destroy($id)
    {
         $log = Log::find($id);
        if ($log) {
            $log->delete();
            return response()->json(['message' => 'Log deleted successfully']);
        } else {
            return response()->json(['message' => 'Log not found'], 404);
        }
    }
}
