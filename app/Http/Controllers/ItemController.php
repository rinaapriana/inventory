<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ItemController extends Controller
{
public function all(?int $categoryId = null): Collection
{
    $query = Item::with('category');

    if (!is_null($categoryId) && $categoryId !== '') {
        $query->where('category_id', $categoryId);
    }

    return $query->get();
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