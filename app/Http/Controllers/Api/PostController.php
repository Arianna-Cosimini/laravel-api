<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $projects = Project::all();
        // $projects = Project::paginate(2);

        // per ricevere i progetti  tutte le tecnologie e i tipi collegati
        $projects = Project::with(['type', 'technologies'])->paginate(2);

        return response()->json([
            "success" => true,
            "results" => $projects
        ]);
    }

    public function show($id)
    {
        // $project = Project::find($id);

        $project = Project::with(['type', 'technologies'])->where('id', '=', $id)->first();


        if ($project) {
            return response()->json([
                "success" => true,
                "project" => $project
            ]);
        } else {
            return response()->json([
                "success" => false,
                "error" => "Progetto non trovato"
            ]);
        }
    }
}
