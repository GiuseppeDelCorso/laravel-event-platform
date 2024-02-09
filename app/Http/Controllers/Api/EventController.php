<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\tag;

class EventController extends Controller
{
    //
    public function index()
    {
        $results = Event::with(['user', 'tags'])->get();
        $data = [
            "success" => true,
            "payload" => $results
        ];
        return response()->json($data);
    }
    public function show($id)
    {
        $event = Event::with('user')->find($id);

        return response()->json([
            "success" => $event ? true : false,
            "payload" => $event ? $event : "l'ID non corrisponde a nessun vento"
        ]);
    }
}
