<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Define route for notifying when a new book is added
$routes->post('notifications/book', 'NotificationController::notifyNewBook');

// Define route for notifying when a loan is created
$routes->post('notifications/loan', 'NotificationController::notifyLoanCreated');

// Define route for notifying when a loan is returned
$routes->post('notifications/loan-return', 'NotificationController::notifyLoanReturned');

// Define route for notifying when a loan is nearing its due date
$routes->post('notifications/loan-due', 'NotificationController::notifyLoanDue');
