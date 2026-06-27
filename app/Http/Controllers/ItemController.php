<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ItemController extends Controller
{
    protected ItemService $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    // GET /api/items
    public function index(Request $request): JsonResponse
    {
        $items = $this->itemService->all($request->category_id);

        return response()->json($items);
    }

    // GET /api/items/{id}
    public function show($id): JsonResponse
    {
        $item = $this->itemService->find($id);

        return response()->json($item);
    }

    // POST /api/items
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $item = $this->itemService->create($request->all());

        return response()->json([
            'message' => 'Item berhasil ditambahkan',
            'data' => $item
        ], 201);
    }

    // PUT /api/items/{id}
    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $item = $this->itemService->update($id, $request->all());

        return response()->json([
            'message' => 'Item berhasil diperbarui',
            'data' => $item
        ]);
    }

    // DELETE /api/items/{id}
    public function destroy($id): JsonResponse
    {
        $this->itemService->delete($id);

        return response()->json([
            'message' => 'Item berhasil dihapus'
        ]);
    }
}