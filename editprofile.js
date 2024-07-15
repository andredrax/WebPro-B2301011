const form = document.getElementById('edit-profile-form');
const profilePicInput = document.getElementById('profile-pic');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const formData = new FormData(form);

    fetch('update_profile.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Profile updated successfully! 🎉');
            form.reset();
        } else {
            alert('Error updating profile: ' + data.error);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});


function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
}

function openRightNav() {
    document.getElementById("rightSidebar").style.width = "250px";
}

function closeRightNav() {
    document.getElementById("rightSidebar").style.width = "0";
}

form.addEventListener('submit', (event) => {
  event.preventDefault();

  const profilePic = profilePicInput.files[0];
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;
  const address = document.getElementById('address').value;

  console.log('Form submitted:');
  console.log('Profile Picture:', profilePic);
  console.log('Name:', name);
  console.log('Email:', email);
  console.log('Password:', password);
  console.log('Address:', address);

  alert('Profile updated successfully! 🎉');
  form.reset();
});

// Microinteraction: Shake effect on button click
const saveBtn = document.querySelector('.save-btn');

saveBtn.addEventListener('click', () => {
  saveBtn.classList.add('shake');
  setTimeout(() => {
    saveBtn.classList.remove('shake');
  }, 500);
});