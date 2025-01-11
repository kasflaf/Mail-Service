<?php

namespace App\Controllers;

use App\Models\UserPreferencesModel;
use CodeIgniter\Controller;

class UserPreferencesController extends Controller
{
    protected $userPreferencesModel;

    public function __construct()
    {
        // Initialize the UserPreferencesModel
        $this->userPreferencesModel = new UserPreferencesModel();
    }

    // Get preferences for a specific user
    public function getPreferences($userId)
    {
        $preferences = $this->userPreferencesModel->getPreferencesByUserId($userId);

        if ($preferences) {
            return view('user_preferences/view', ['preferences' => $preferences]);
        } else {
            return redirect()->to('/userpreferences')->with('error', 'Preferences not found for this user.');
        }
    }

    // Update preferences for a specific user
    public function updatePreferences($userId)
    {
        $validation = \Config\Services::validation();

        // Validate input data
        if (!$this->validate([
            'preferences' => 'required|valid_json',
        ])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Get preferences data from the request
        $preferences = json_decode($this->request->getPost('preferences'), true);

        // Update the user's preferences
        if ($this->userPreferencesModel->updatePreferences($userId, $preferences)) {
            return redirect()->to('/userpreferences/' . $userId)->with('success', 'User preferences updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update user preferences.');
        }
    }
}
