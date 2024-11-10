// Function to get the current year
function getCurrentYear() {
    const date = new Date();
    return date.getFullYear();
}

// Track the number of visits for the current year
function trackYearlyVisit() {
    const currentYear = getCurrentYear(); // Use the current year as the key
    const visitsKey = `visits_${currentYear}`;  // Store visits using the format 'YYYY'

    // Get current visit count for the year from localStorage, or default to 0
    let visitCount = localStorage.getItem(visitsKey);
    visitCount = visitCount ? parseInt(visitCount) : 0;

    // Increment the visit count
    visitCount++;

    // Save the updated count back to localStorage
    localStorage.setItem(visitsKey, visitCount);

    // Update all elements with class 'traffic-count' to show the total visit count for the current year
    const trafficElements = document.querySelectorAll('.traffic-count');
    trafficElements.forEach(element => {
        element.textContent = `Total visits for ${currentYear}: ${visitCount}`;
    });
}

// Call the trackYearlyVisit function to log the current visit and update the display
trackYearlyVisit();
