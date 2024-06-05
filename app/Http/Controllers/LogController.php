<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $logs = Log::paginate(10);
        if ($request->wantsJson()) {
        }
        return view('logs', compact('logs'));
    }

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

        try {
            $datalog->save();
            return response()->json(["message" => "Log data saved successfully."], 201);
        } catch (\Exception $e) {
            // Handle database errors or other exceptions
            return response()->json(["message" => "Failed to save log data: " . $e->getMessage()], 500);
        }
    }

    public function show(string $id)
    {
        return Log::find($id);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'device_id' => 'sometimes|required|exists:transducers,id',
            'value' => 'sometimes|required|numeric',
            'max_value' => 'sometimes|required|integer',
            'min_value' => 'sometimes|required|integer',
        ]);

        $datalog = Log::find($id);
        if ($datalog) {
            $datalog->update($request->all());
            return response()->json(["message" => "Log updated successfully.", "log" => $datalog], 200);
        } else {
            return response()->json(["message" => "Log not found."], 404);
        }
    }

    public function destroy($id)
    {
        $log = Log::find($id);
        if ($log) {
            $log->delete();
        } else {
            return response()->json(['message' => 'Log not found'], 404);
        }
    }
}
