<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use PhpParser\Node\Stmt\Return_;
use App\Http\Resources\Apiresource;
use Illuminate\Support\Facades\Validator;
use spatie\Permission\Models\Role;
use spatie\Permission\Models\Permission;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware(["role:superadmin"]);
    }

    public function index()
    {
        $this->authorize('Lihat Task');
        $Task = Task::latest()->paginate(10);
        return response()->json($Task);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'title' => '',
            'description' => '',
            'status' => '',
            'due_date' => '',
            'category_id' => '',
            'user_id' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date',
            'category_id' => 'required|exists:categories,id', // Validasi kategori
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $store = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
        ]);

        return new Apiresource(
            $store, "Berhasil Disimpan", "false"
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Task = Task::find($id);

        if (is_null($Task)) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return new Apiresource(
            $Task, "berhasil", "true"
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Task = Task::find($id);

        if (is_null($Task)) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json($Task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Task = Task::find($id);

        if (is_null($Task)) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date',
            'category_id' => 'required|exists:categories,id', // Validasi kategori
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $Task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
        ]);

        return new Apiresource(
            $Task, "Berhasil Diperbarui", "true"
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Task = Task::find($id);

        if (is_null($Task)) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $Task->delete();

        return new Apiresource(
            $Task, "Berhasil Dihapus", "false"
        );
    }
}
