<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Rule::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rule_cluster_id' => 'required|integer',
            'sensor_id' => 'required|exists:logs,id',
            'sensor_operator' => 'required|in:more than,less than',
            'sensor_value' => 'required|numeric',
            'actuator_id' => 'required|exists:logs,id',
            'actuator_value' => 'required|numeric',
        ]);

        // $rule = Rule::create($request->all());

        // return response()->json(['message' => 'Rule created successfully.', 'rule' => $rule], 201);

        $rule = new Rule();
        $rule->rule_cluster_id = $request->rule_cluster_id;
        $rule->sensor_id = $request->sensor_id;
        $rule->sensor_operator = $request->sensor_operator;
        $rule->sensor_value = $request->sensor_value;
        $rule->actuator_id = $request->actuator_id;
        $rule->actuator_value = $request->actuator_value;
        $rule->save();

        return response()->json(["message" => "Device updated."], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rule = Rule::find($id);;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rule_cluster_id' => 'sometimes|required|integer',
            'sensor_id' => 'sometimes|required|exists:logs,id',
            'sensor_operator' => 'sometimes|required|in:more than,less than',
            'sensor_value' => 'sometimes|required|numeric',
            'actuator_id' => 'sometimes|required|exists:logs,id',
            'actuator_value' => 'sometimes|required|numeric',
        ]);

        if (Rule::where('id', $id)->exists()) {
            $rule = Rule::find($id);
            $rule->update($request->all());
            $rule->save();

        return response()->json(["message" => "Device updated."], 201);
        } else {
            return response()->json(["message" => "Device not found."], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rule = Rule::find($id);
        $rule->delete();

        return response()->json(['message' => 'Rule deleted successfully.'], 200);
    }
}
