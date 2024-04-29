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
        $projects = Project::with(['types', 'technologies'])->paginate(2);

        return response()->json([
            "success" => true,
            "results" => $projects
        ]);
    }
}
