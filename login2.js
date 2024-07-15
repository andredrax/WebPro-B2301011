// login22.js

// Add event listener to the form submit
document.getElementById('login-form').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the default form submission
  
  // Get the values of UserID and password inputs
  var userID = document.getElementById('ID').value;
  var password = document.getElementById('password').value;
  
  // Example simple validation
  if (userID === 'admin' && password === 'password') {
    alert('Login successful!');
    // Here you can redirect to another page or perform other actions after successful login
  } else {
    alert('Login failed. Please check your username and password.');
  }
});

// Function to toggle password visibility
function togglePasswordVisibility() {
  var passwordInput = document.getElementById('password');
  var passwordToggle = document.querySelector('.password-toggle');
  
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    passwordToggle.textContent = 'Hide';
  } else {
    passwordInput.type = 'password';
    passwordToggle.textContent = 'Show';
  }
}

// Function to show Forgot Password form
function showForgotPasswordForm() {
  document.getElementById('forgot-password-form').style.display = 'block';
  document.querySelector('.login-container').style.display = 'none'; // Hide login form when showing Forgot Password form
}

// Function to show Sign Up form
function showSignUpForm() {
  document.getElementById('sign-up-form').style.display = 'block';
  document.querySelector('.login-container').style.display = 'none'; // Hide login form when showing Sign Up form
}

// Function to close form
function closeForm(formId) {
  document.getElementById(formId).style.display = 'none';
  document.querySelector('.login-container').style.display = 'block'; // Show login form when closing any form
}
