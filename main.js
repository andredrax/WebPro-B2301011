const chatForm = document.getElementById('liveChatForm');
const usernameInput = document.getElementById('usernameInput');
const chatInput = document.getElementById('chatInput');
const chatMessages = document.getElementById('liveChatMessages');

const ws = new WebSocket('ws://localhost:8080');

ws.onopen = () => {
    console.log('Connected to the WebSocket server');
};

ws.onerror = (error) => {
    console.log('WebSocket error:', error);
};

ws.onmessage = (event) => {
    const message = JSON.parse(event.data);
    addMessageToChat(message.userType, message.username, message.text);
};

chatForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const message = chatInput.value.trim();
    const username = usernameInput.value.trim();
    if (message && username) {
        const msg = JSON.stringify({ userType: 'user', username, text: message });
        addMessageToChat('user', username, message);
        ws.send(msg);
        chatInput.value = '';
    }
});
function addMessageToChat(userType, username, message) {
    const messageElement = document.createElement('div');
    messageElement.classList.add('chat-message', userType);
    messageElement.textContent = `${username}: ${message}`;
    messageElement.style.color = '#fff'; // Ensuring text color is white
    chatMessages.appendChild(messageElement);
    chatMessages.scrollTop = chatMessages.scrollHeight; // Scroll to the bottom
}

