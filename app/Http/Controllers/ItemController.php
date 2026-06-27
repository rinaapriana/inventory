<?php

namespace App\Http\Controllers;

 HEAD
use App\Services\ItemService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
=======
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Services\ItemService;
use App\Http\Controllers\Api\BaseController;
origin/feature/auth-sanctum

class ItemController extends BaseController
{
HEAD
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

    protected ItemService $svc;

    public function __construct(ItemService $svc)
    {
        $this->svc = $svc;
    }

    public function index()
    {
        return $this->success($this->svc->all());
    }

    public function store(StoreItemRequest $req)
    {
        $item = $this->svc->create($req->validated());

        return $this->success($item, "Item dibuat", 201);
>>>>>>> origin/feature/auth-sanctum
    }

    // GET /api/items/{id}
    public function show($id): JsonResponse
    {
HEAD
        $item = $this->itemService->find($id);

        return response()->json($item);
=======
        try {
            $item = $this->svc->find($id);

            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 404);
        }
    }

    public function update(UpdateItemRequest $req, $id)
    {
        $item = $this->svc->update($id, $req->validated());

        return $this->success($item, "Item diperbarui");
>>>>>>> origin/feature/auth-sanctum
    }

    // POST /api/items
    public function store(Request $request): JsonResponse
    {
HEAD
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

        $this->svc->delete($id);

        return $this->success(null, "Item dihapus", 204);
 origin/feature/auth-sanctum
    }
}