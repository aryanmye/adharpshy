// Function to get the current date in YYYY-MM-DD format
function getCurrentDay() {
    const date = new Date();
    const year = date.getFullYear();
    const month = ('0' + (date.getMonth() + 1)).slice(-2);  // Adds leading zero if month < 10
    const day = ('0' + date.getDate()).slice(-2);  // Adds leading zero if day < 10
    return `${year}-${month}-${day}`;
}

// Track the number of visits for the current day
function trackVisit() {
    const currentDay = getCurrentDay(); // Use the current day as the key
    const visitsKey = `visits_${currentDay}`;  // Store visits using the format 'YYYY-MM-DD'

    // Get current visit count from localStorage, or default to 0
    let visitCount = localStorage.getItem(visitsKey);
    visitCount = visitCount ? parseInt(visitCount) : 0;

    // Increment the visit count
    visitCount++;

    // Save the updated count back to localStorage
    localStorage.setItem(visitsKey, visitCount);

    // Update all elements with class 'traffic-count' to show the visit count for the current day
    const trafficElements = document.querySelectorAll('.traffic-counttoday');
    trafficElements.forEach(element => {
        element.textContent = `${visitCount}`;
    });
}

// Call the trackVisit function to log the current visit and update the display
trackVisit();
