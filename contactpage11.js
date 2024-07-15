document.addEventListener('DOMContentLoaded', function() {
  var form = document.getElementById('contactForm');
  var responseMessage = document.getElementById('responseMessage');

  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting

    // Perform validation if needed (you can add more checks as per your requirement)
    var fname = document.getElementById('fname').value.trim();
    var lname = document.getElementById('lname').value.trim();
    var email = document.getElementById('email').value.trim();
    var message = document.getElementById('message').value.trim();

    if (fname === '' || lname === '' || email === '' || message === '') {
      alert('Please fill in all fields.');
      return;
    }

    // Optional: You can handle AJAX submission here if you want to send data to a server without page reload
    // For demonstration purposes, we'll just show a confirmation message
    responseMessage.innerHTML = '<p>🎉 Thank you for your message! 💌</p>';
    responseMessage.style.opacity = 1;

    // Reset the form after submission
    form.reset();

    // Hide the message after 3 seconds
    setTimeout(function() {
      responseMessage.style.opacity = 0;
    }, 3000);
  });
});
