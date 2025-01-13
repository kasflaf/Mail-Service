# Tugas-II3160-Teknolgi-Sistem-Terintegrasi

### Contoh Penggunaan API:
Route:
POST /notifications/book
JSON Payload:
{ "book_title": "The Great Gatsby", "user_email": "user@example.com" }
Response:
{ "message": "Notification sent successfully" }
Or
{ "error": "Invalid payload" }
Or
{ "error": "Failed to send notification" }

Route:
POST /notifications/loan
JSON Payload:
{ "loan_id": "12345", "user_email": "user@example.com" }
Response:
{ "message": "Notification sent successfully" }
Or
{ "error": "Invalid payload" }
Or
{ "error": "Failed to send notification" }


Route:
POST /notifications/loan-return
JSON Payload:
{ "loan_id": "12345", "user_email": "user@example.com" }
Response:
{ "message": "Notification sent successfully" }
Or
{ "error": "Invalid payload" }
Or
{ "error": "Failed to send notification" }

Route:
POST /notifications/loan-return
JSON Payload:
{ "loan_id": "12345", "user_email": "user@example.com", "due_date": "2025-01-20" }
Response:
{ "message": "Notification sent successfully" }
Or
{ "error": "Invalid payload" }
Or
{ "error": "Failed to send notification" }
