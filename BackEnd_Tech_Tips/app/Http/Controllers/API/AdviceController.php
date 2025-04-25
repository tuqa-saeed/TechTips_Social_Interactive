<?php
namespace App\Http\Controllers\API;

use App\Models\Advice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdviceController extends Controller
{
    public function index()
    {
        return Advice::with(['category', 'user'])->get();
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string',
        'content' => 'required|string',
        'category_id' => 'required|exists:categories,id',
    ]);

    $validated['user_id'] = auth()->id();

    $advice = Advice::create($validated);

    return response()->json($advice, 201);
}

    public function show($id)
    {
        $advice = Advice::with(['category', 'user', 'comments'])->findOrFail($id);
        return response()->json($advice);
    }

    public function update(Request $request, $id)
{
    $advice = Advice::findOrFail($id);

    if ($advice->user_id != auth()->id()) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    $advice->update($request->only(['title', 'content', 'category_id']));

    return response()->json($advice);
}


public function destroy($id)
{
    $advice = Advice::findOrFail($id);

    if ($advice->user_id != auth()->id()) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    $advice->delete();
    return response()->json(['message' => 'Advice deleted']);
}
public function reportAdvice(Request $request, $id)
{
    $advice = Advice::find($id);

    if (!$advice) {
        return response()->json(['message' => 'Advice not found'], 404);
    }

    $advice->increment('reports_count');

    return response()->json(['message' => 'Advice reported successfully']);
}


}
