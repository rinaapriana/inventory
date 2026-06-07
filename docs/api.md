# Inventory System API v1

Base URL:
http://localhost:8000/api/v1

## Authentication

### Register

POST /register

Body:

```json
{
  "name": "Rina",
  "email": "rina@gmail.com",
  "password": "password",
  "password_confirmation": "password"
}
```

Response:

```json
{
  "success": true,
  "message": "User registered",
  "data": {
    "user": {},
    "token": "token"
  }
}
```

### Login

POST /login

Body:

```json
{
  "email": "rina@gmail.com",
  "password": "password"
}
```

Response:

```json
{
  "success": true,
  "message": "Login berhasil",
  "data": {
    "token": "token"
  }
}
```

---

## Categories

### GET /categories

Header:

Authorization: Bearer {token}

### POST /categories

Body:

```json
{
  "name": "Elektronik"
}
```

### GET /categories/{id}

### PUT /categories/{id}

Body:

```json
{
  "name": "Elektronik Update"
}
```

### DELETE /categories/{id}

(Admin Only)

---

## Items

### GET /items

Header:

Authorization: Bearer {token}

### POST /items

Body:

```json
{
  "name": "Laptop",
  "quantity": 10,
  "price": 12000000,
  "category_id": 1
}
```

### GET /items/{id}

### PUT /items/{id}

Body:

```json
{
  "name": "Laptop Gaming",
  "quantity": 15,
  "price": 15000000,
  "category_id": 1
}
```

### DELETE /items/{id}

(Admin Only)