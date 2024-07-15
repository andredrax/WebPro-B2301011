// Simulated API call to fetch user data (replace with actual API integration)
function fetchUserData() {
    return new Promise((resolve, reject) => {
        // Simulated delay for API call
        setTimeout(() => {
            resolve({
                coursesCompleted: 50,
                quizzesTaken: 25,
                daysActive: 30,
                quizCount: 100
            });
        }, 1000); // Simulate 1 second delay
    });
}

// Update dashboard with fetched user data
document.addEventListener('DOMContentLoaded', function() {
    fetchUserData().then(userData => {
        // Update courses completed progress bar
        const coursesProgress = document.getElementById('courses-progress');
        coursesProgress.style.width = `${userData.coursesCompleted}%`;
        coursesProgress.setAttribute('aria-valuenow', userData.coursesCompleted);

        // Update quizzes taken progress bar
        const quizzesProgress = document.getElementById('quizzes-progress');
        quizzesProgress.style.width = `${userData.quizzesTaken}%`;
        quizzesProgress.setAttribute('aria-valuenow', userData.quizzesTaken);

        // Update days active count
        const daysActiveCount = document.getElementById('days-active-count');
        daysActiveCount.textContent = userData.daysActive;

        // Update total quiz count
        const quizCountTotal = document.getElementById('quiz-count-total');
        quizCountTotal.textContent = userData.quizCount;
    }).catch(error => {
        console.error('Error fetching user data:', error);
    });
});
