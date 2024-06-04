<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index(Request $request)
    {
        $rules = Rule::paginate(10);
        if ($request->wantsJson()) {
            return response()->json($rules);
        }
        return view('rules', compact('rules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rule_cluster_id' => 'required',
            'sensor_id' => 'required',
            'sensor_operator' => 'required',
            'sensor_value' => 'required',
            'actuator_id' => 'required',
            'actuator_value' => 'required',
        ]);

        $rule = new Rule();
        $rule->rule_cluster_id = $validated['rule_cluster_id'];
        $rule->sensor_id = $validated['sensor_id'];
        $rule->sensor_operator = $validated['sensor_operator'];
        $rule->sensor_value = $validated['sensor_value'];
        $rule->actuator_id = $validated['actuator_id'];
        $rule->actuator_value = $validated['actuator_value'];
        $rule->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Rule::find($id);
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

        $rule = Rule::find($id);
        if ($rule) {
            $rule->update($request->all());
            return response()->json(["message" => "Rule updated successfully.", "rule" => $rule], 200);
        } else {
            return response()->json(["message" => "Rule not found."], 404);
        }
    }

    public function destroy($id)
    {
        $rule = Rule::find($id);
        if ($rule) {
            $rule->delete();
        } else {
            return response()->json(['message' => 'Log not found'], 404);
        }
    }
}
