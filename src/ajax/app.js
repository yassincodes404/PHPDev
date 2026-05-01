/**
 * Simple AJAX Frontend Logic
 * This script fetches data from handler.php without refreshing the page.
 */

function refreshDashboardData() {
    console.log("Fetching live data via AJAX...");

    // Use the modern Fetch API to make an AJAX call
    fetch('../ajax/handler.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the JSON data
        })
        .then(data => {
            console.log("Data received:", data);

            // Update the UI elements if they exist on the page
            const tipElement = document.getElementById('live-study-tip');
            const timeElement = document.getElementById('server-time');
            const userCountElement = document.getElementById('online-users');

            if (tipElement) tipElement.innerText = data.study_tip;
            if (timeElement) timeElement.innerText = data.server_time;
            if (userCountElement) userCountElement.innerText = data.online_users;
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}

// Automatically refresh data every 10 seconds
setInterval(refreshDashboardData, 10000);

// Also run it once when the script loads
document.addEventListener('DOMContentLoaded', refreshDashboardData);
