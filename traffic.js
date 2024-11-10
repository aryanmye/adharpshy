// Function to get the current month and year in YYYY-MM format
function getCurrentMonth() {
    const date = new Date();
    const year = date.getFullYear();
    const month = ('0' + (date.getMonth() + 1)).slice(-2);  // Adds leading zero if month < 10
    return `${year}-${month}`;
}

// Track the number of visits for the current month
function trackVisit() {
    const currentMonth = getCurrentMonth();
    const visitsKey = `visits_${currentMonth}`;

    // Get current visit count from localStorage, or default to 0
    let visitCount = localStorage.getItem(visitsKey);
    visitCount = visitCount ? parseInt(visitCount) : 0;

    // Increment the visit count
    visitCount++;

    // Save the updated count back to localStorage
    localStorage.setItem(visitsKey, visitCount);

    // Update all elements with class 'traffic-count'
    const trafficElements = document.querySelectorAll('.traffic-count');
    trafficElements.forEach(element => {
        element.textContent = `Total website visits this month: ${visitCount}`;
    });
}

// Call the trackVisit function to log the current visit and update the display
trackVisit();
