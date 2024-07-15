document.addEventListener('DOMContentLoaded', function() {
    // Live Chat Form Submission
    const liveChatForm = document.getElementById('liveChatForm');
    const liveChatMessages = document.getElementById('liveChatMessages');

    liveChatForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const messageInput = document.getElementById('chatInput');
        const message = messageInput.value.trim();

        if (message !== '') {
            appendMessage('You', message);
            messageInput.value = '';
            // Simulate response after 1 second (replace with actual logic)
            setTimeout(() => {
                appendMessage('Andreeee', 'Typing...');
            }, 1000);
            setTimeout(() => {
                removeTypingIndicator('Andreeee');
                appendMessage('Andreeee', 'Hello! How can I assist you today?');
            }, 2000);
        }
    });

    // Function to append messages to the live chat
    function appendMessage(sender, message) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('message');
        messageElement.innerHTML = `<strong>${sender}:</strong> ${message}`;
        liveChatMessages.appendChild(messageElement);
        liveChatMessages.scrollTop = liveChatMessages.scrollHeight;
    }

    // Function to remove typing indicator
    function removeTypingIndicator(sender) {
        const messages = liveChatMessages.getElementsByClassName('message');
        for (let i = messages.length - 1; i >= 0; i--) {
            if (messages[i].innerHTML.includes(`<strong>${sender}:</strong> Typing...`)) {
                messages[i].remove();
                break;
            }
        }
    }
});
