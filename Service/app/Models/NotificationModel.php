<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table      = 'notifications';
    protected $primaryKey = 'id';
    
    // Allowed fields to be inserted/updated
    protected $allowedFields = ['user_id', 'type', 'content', 'status', 'created_at'];

    // Set the table columns to be handled by the model
    protected $returnType     = 'array';
    protected $useTimestamps  = false; // We are managing 'created_at' manually
    
    // Validation rules for data before insertion
    protected $validationRules = [
        'user_id' => 'required|integer',
        'type'    => 'required|string',
        'content' => 'required|string',
        'status'  => 'required|string|in_list[pending, sent]',
    ];

    // Date format for 'created_at' field (if used in your application)
    protected $createdField   = 'created_at';
    protected $updatedField   = null;  // Not used, we don't need to track updates
}
