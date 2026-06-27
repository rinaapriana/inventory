<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class ItemService
{
    // Menampilkan semua item
    public function all(?int $categoryId = null): Collection
    {
        $query = Item::with('category');

        if (!is_null($categoryId) && $categoryId != '') {
            $query->where('category_id', $categoryId);
        }

        return $query->get();
    }

    // Menampilkan detail item
    public function find(int $id): Item
    {
        return Item::with('category')->findOrFail($id);
    }

    // Create Item
    public function create(array $data): Item
    {
        $item = Item::create($data);

        Log::info('Item created successfully', [
            'id' => $item->id,
            'name' => $item->name,
            'data' => $data,
        ]);

        return $item;
    }

    // Update Item
    public function update(int $id, array $data): Item
    {
        $item = Item::findOrFail($id);

        $item->update($data);

        Log::info('Item updated successfully', [
            'id' => $id,
            'changes' => $data,
        ]);

        return $item;
    }

    // Delete Item
    public function delete(int $id): void
    {
        $item = Item::findOrFail($id);

        Log::info('Item deleted successfully', [
            'id' => $item->id,
            'name' => $item->name,
        ]);

        $item->delete();
    }
}