# Mailing Service API Documentation

## Endpoints

### 1. Book Notification
Send a notification about a book.

**Endpoint:** `POST /notifications/book`

**Request Body:**
```json
{
    "book_title": "The Great Gatsby",
    "user_email": "user@example.com"
}
```

**Responses:**
```json
// Success Response (200 OK)
{
    "message": "Notification sent successfully"
}

// Error Response (400 Bad Request)
{
    "error": "Invalid payload"
}

// Error Response (500 Internal Server Error)
{
    "error": "Failed to send notification"
}
```

### 2. Loan Notification
Send a notification about a loan.

**Endpoint:** `POST /notifications/loan`

**Request Body:**
```json
{
    "loan_id": "12345",
    "user_email": "user@example.com"
}
```

**Responses:**
Same as above.

### 3. Loan Return Notification
Send a notification about a loan return.

**Endpoint:** `POST /notifications/loan-return`

**Request Body:**
```json
{
    "loan_id": "12345",
    "user_email": "user@example.com"
}
```

**Responses:**
Same as above.

### 4. Loan Due Date Notification
Send a notification about a loan's due date.

**Endpoint:** `POST /notifications/loan-return`

**Request Body:**
```json
{
    "loan_id": "12345",
    "user_email": "user@example.com",
    "due_date": "2025-01-20"
}
```

**Responses:**
Same as above.

## Common Response Codes
- `200 OK`: Request successful
- `400 Bad Request`: Invalid payload
- `500 Internal Server Error`: Server-side error

## Notes
- All requests must be sent with Content-Type: application/json
- All dates should be in ISO 8601 format (YYYY-MM-DD)
- Email addresses must be valid format
