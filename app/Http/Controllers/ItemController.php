<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Services\ItemService;

class ItemController extends BaseController
{
    protected ItemService $svc;

    public function __construct(ItemService $svc)
    {
        $this->svc = $svc;
    }

    // GET /api/items
    public function index()
    {
        return $this->success($this->svc->all());
    }

    // GET /api/items/{id}
    public function show($id)
    {
        try {
            $item = $this->svc->find($id);

            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 404);
        }
    }

    // POST /api/items
    public function store(StoreItemRequest $req)
    {
        $item = $this->svc->create($req->validated());

        return $this->success($item, "Item dibuat", 201);
    }

    // PUT /api/items/{id}
    public function update(UpdateItemRequest $req, $id)
    {
        $item = $this->svc->update($id, $req->validated());

        return $this->success($item, "Item diperbarui");
    }

    // DELETE /api/items/{id}
    public function destroy($id)
    {
        $this->svc->delete($id);

        return $this->success(null, "Item dihapus", 204);
    }
}