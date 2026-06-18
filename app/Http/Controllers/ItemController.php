<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ItemController extends Controller
{
public function index(Request $request): JsonResponse
{
    $query = Item::with('category');

    if ($request->has('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    $items = $query->get();

    return response()->json([
        'message' => 'Berhasil menarik semua data Item',
        'data' => $items
    ]);
}

    public function show($id)
    {
        return response()->json(Item::with('category')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        Item::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}