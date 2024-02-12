<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\tag;

class TagsController extends Controller
{
    //
    public function index()
    {
        $results = Tag::with('events')->get();
        $data = [
            "success" => true,
            "payload" => $results
        ];
        return response()->json($data);
    }
    public function show($id)
    {
        $event = Tag::with('events')->find($id);

        return response()->json([
            "success" => $event ? true : false,
            "payload" => $event ? $event : "l'ID non corrisponde a nessun vento"
        ]);
    }
}
