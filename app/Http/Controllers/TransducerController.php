<?php

namespace App\Http\Controllers;

use App\Models\Transducer;
use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;
use Illuminate\Support\Facades\Log;

class TransducerController extends Controller
{

    // Display a listing of the resource.
    public function index()
    {
        return Transducer::all();
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'device_name' => 'required|string|max:255',
            'device_type' => 'required|in:Sensor,Actuator',
        ]);


        $transducer = new Transducer();
        $transducer->device_name = $request->device_name;
        $transducer->device_type = $request->device_type;
        if ($transducer->save()) {
            $data = [
              'device_name' => $request->device_name,
              'device_type' => $request->device_type,
            ];

            try {
              $mqtt = MQTT::connection();
              $mqtt->publish('device/devices', json_encode($data));
              Log::info('Published device data to MQTT topic: device/devices'); // Log successful publish
            } catch (\Exception $e) {
              Log::error('Error publishing data to MQTT: ' . $e->getMessage()); // Log any errors
            }

            return response()->json(["message" => "Device created and published to MQTT."], 201);
          } else {
            return response()->json(["message" => "Failed to create device."], 500);
        }
    }

    // Display the specified resource.
    public function show(string $id)
    {
        return Transducer::find($id);
    }

    // Update the specified resource in storage.
    public function update(Request $request, string $id)
    {
        $request->validate([
            'device_name' => 'sometimes|required',
            'device_type' => 'sometimes|required|in:Sensor,Actuator',
        ]);

        if (Transducer::where('id', $id)->exists()) {
            $transducer = Transducer::find($id);
            $transducer->device_name = $request->input('device_name', $transducer->device_name);
            $transducer->device_type = $request->input('device_type', $transducer->device_type);
            $transducer->save();

            return response()->json(["message" => "Device updated."], 201);
        } else {
            return response()->json(["message" => "Device not found."], 404);
        }
    }

    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        if (Transducer::where('id', $id)->exists()) {
            $transducer = Transducer::find($id);
            $transducer->delete();
            return response()->json(["message" => "Device deleted."], 201);
        } else {
            return response()->json(["message" => "Device not found."], 404);
        }
    }
}
