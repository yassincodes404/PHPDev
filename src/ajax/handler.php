<?php
/**
 * Simple AJAX Backend Handler
 * This file returns JSON data to be consumed by JavaScript.
 */

// Set header to return JSON
header('Content-Type: application/json');
http_response_code(200);

// Simulate a database check or calculation
$study_tips = [
    "Consistency is key! Try to study at the same time every day.",
    "Take short breaks every 25 minutes (Pomodoro technique).",
    "Explain what you learned to someone else to reinforce it.",
    "Stay hydrated and get enough sleep for better memory retention.",
    "Active recall is better than passive reading."
];

// Prepare the response data
$response = [
    'status' => 'success',
    'server_time' => date('H:i:s'),
    'study_tip' => $study_tips[array_rand($study_tips)],
    'online_users' => rand(5, 50) // Simulating live data
];

// Return the data as a JSON string
echo json_encode($response);
?>
