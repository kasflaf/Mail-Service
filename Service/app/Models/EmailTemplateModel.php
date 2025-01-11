<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailTemplateModel extends Model
{
    protected $table      = 'email_templates';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'subject', 'body'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Add validation rules for the EmailTemplate model
    protected $validationRules = [
        'name'    => 'required|min_length[3]|max_length[255]',
        'subject' => 'required|min_length[3]|max_length[255]',
        'body'    => 'required',
    ];

    protected $validationMessages = [
        'name'    => [
            'required'    => 'The name field is required.',
            'min_length'  => 'The name must be at least 3 characters long.',
            'max_length'  => 'The name cannot exceed 255 characters.',
        ],
        'subject' => [
            'required'    => 'The subject field is required.',
            'min_length'  => 'The subject must be at least 3 characters long.',
            'max_length'  => 'The subject cannot exceed 255 characters.',
        ],
        'body'    => [
            'required'    => 'The body field is required.',
        ],
    ];

    public function getTemplateById($id)
    {
        return $this->find($id);
    }

    public function getAllTemplates()
    {
        return $this->findAll();
    }

    public function createTemplate($data)
    {
        return $this->save($data);
    }

    public function updateTemplate($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteTemplate($id)
    {
        return $this->delete($id);
    }
}
