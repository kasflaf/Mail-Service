<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use CodeIgniter\Email\Email;

class NotificationController extends BaseController
{
    protected $email;
    protected $notificationModel;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();

        // Initialize the Email configuration
        $this->email = \Config\Services::email();
        $this->email->setFrom(env('email.fromEmail'), env('email.fromName'));
    }

    public function notifyNewBook()
    {
        $data = $this->request->getPost();

        if (!isset($data['book_title'], $data['user_email'])) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Invalid payload']);
        }

        // Add to database (for tracking notifications)
        $this->notificationModel->insert([
            'type' => 'new_book',
            'context' => json_encode(['book_title' => $data['book_title']]),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        // Send email notification
        $this->email->setTo($data['user_email']);
        $this->email->setSubject('New Book Available');
        $this->email->setMessage("A new book titled '{$data['book_title']}' has been added to the library!");

        if ($this->email->send()) {
            return $this->response->setJSON(['message' => 'Notification sent successfully']);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to send notification']);
        }
    }

    public function notifyLoanCreated()
    {
        $data = $this->request->getPost();

        if (!isset($data['loan_id'], $data['user_email'])) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Invalid payload']);
        }

        // Add to database (for tracking notifications)
        $this->notificationModel->insert([
            'type' => 'loan_created',
            'context' => json_encode(['loan_id' => $data['loan_id']]),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        // Send email notification
        $this->email->setTo($data['user_email']);
        $this->email->setSubject('Loan Created Successfully');
        $this->email->setMessage("Your loan with ID '{$data['loan_id']}' has been successfully created!");

        if ($this->email->send()) {
            return $this->response->setJSON(['message' => 'Notification sent successfully']);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to send notification']);
        }
    }

    public function notifyLoanReturned()
    {
        $data = $this->request->getPost();

        if (!isset($data['loan_id'], $data['user_email'])) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Invalid payload']);
        }

        // Add to database (for tracking notifications)
        $this->notificationModel->insert([
            'type' => 'loan_returned',
            'context' => json_encode(['loan_id' => $data['loan_id']]),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        // Send email notification
        $this->email->setTo($data['user_email']);
        $this->email->setSubject('Loan Returned Successfully');
        $this->email->setMessage("Your loan with ID '{$data['loan_id']}' has been successfully returned!");

        if ($this->email->send()) {
            return $this->response->setJSON(['message' => 'Notification sent successfully']);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to send notification']);
        }
    }

    public function notifyLoanDue()
    {
        $data = $this->request->getPost();

        if (!isset($data['loan_id'], $data['user_email'], $data['due_date'])) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Invalid payload']);
        }

        // Add to database (for tracking notifications)
        $this->notificationModel->insert([
            'type' => 'loan_due',
            'context' => json_encode([
                'loan_id' => $data['loan_id'],
                'due_date' => $data['due_date'],
            ]),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        // Send email notification
        $this->email->setTo($data['user_email']);
        $this->email->setSubject('Loan Due Reminder');
        $this->email->setMessage("Your loan with ID '{$data['loan_id']}' is nearing its due date: {$data['due_date']}.");

        if ($this->email->send()) {
            return $this->response->setJSON(['message' => 'Notification sent successfully']);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to send notification']);
        }
    }
}
