# API Documentation

## Get Items

Mengambil seluruh data item.

### Endpoint

GET /api/v1/items

### Response

```json
{
  "status": "success",
  "data": [...]
}
```

---

## Get Items By Category

Mengambil item berdasarkan kategori tertentu.

### Endpoint

GET /api/v1/items?category_id={id}

### Example Request

GET /api/v1/items?category_id=2

### Success Response

```json
{
  "status": "success",
  "data": [
    {
      "id": 1,
      "name": "Mouse",
      "category_id": 2
    }
  ]
}
```

### Empty Result Response

```json
{
  "status": "success",
  "data": []
}
```