const tourSteps = [
    { text: 'Welcome! Click "Next" to learn how to navigate.', target: null },
    { text: 'This is the Home button. Click here to go to the homepage.', target: 'a[href="home.php"]' },
    { text: 'Navigate to the My Library section by clicking on the "My Library" button.', target: 'a[href="library.php"]' },
    { text: 'Finally, visit your profile by clicking on the "Profile" button.', target: 'a[href="profile.php"]' },
    // Add more steps for other buttons or sections
];

let stepIndex = 0;

function showTourBox() {
    const tourBox = document.querySelector('.tour-box');
    tourBox.style.display = 'block';
}

function hideTourBox() {
    const tourBox = document.querySelector('.tour-box');
    tourBox.style.display = 'none';
}

function updateTourText() {
    const tourText = document.getElementById('tour-text');
    tourText.textContent = tourSteps[stepIndex].text;
}

function nextStep() {
    if (stepIndex < tourSteps.length - 1) {
        stepIndex++;
        updateTourText();
        
    } else {
        hideTourBox();
        
    }
}

// Show the initial tour box
showTourBox();



