<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
  body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .chat-container {
            max-width: 400px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            height: 80vh;
        }

        .chat-header {
            background-color: #128C7E;
            color: #fff;
            padding: 15px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .chat-messages {
            padding: 20px;
            flex: 1;
            overflow-y: scroll;
        }

        .message {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .user-message {
            align-self: flex-end;
            background-color: #DCF8C6;
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
            word-wrap: break-word;
        }

        .other-message {
            align-self: flex-start;
            background-color: #E4E4E4;
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
            word-wrap: break-word;
        }

        .chat-footer {
            padding: 15px;
            display: flex;
            align-items: center;
            background-color: #f5f5f5;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .chat-footer input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .chat-footer button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #128C7E;
            color: #fff;
            margin-left: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            WhatsApp-like Chat
        </div>
        <div class="chat-messages" id="chat-messages">
            <!-- Messages will appear here -->
        </div>
        <div class="chat-footer">
            <input type="text" id="message-input" placeholder="Type a message...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>


        <script>
        let messages = [];

        function displayMessages() {
            const chatMessages = document.getElementById('chat-messages');
            chatMessages.innerHTML = '';
            messages.forEach((message) => {
                const newMessage = `<div class="message ${message.type}">${message.content}</div>`;
                chatMessages.insertAdjacentHTML('beforeend', newMessage);
            });
        }

        function sendMessage() {
            const messageInput = document.getElementById('message-input');
            const messageContent = messageInput.value;
            if (messageContent.trim() === '') return;
            const newMessage = { content: messageContent, type: 'user' };
            messages.push(newMessage);
            displayMessages();
            messageInput.value = '';
            simulateReply(); // Simulate a reply after the user sends a message
        }

        function simulateReply() {
            setTimeout(() => {
                const reply = 'Thanks for your message!'; // Simulated reply message
                const newReply = { content: reply, type: 'other' };
                messages.push(newReply);
                displayMessages();
            }, 1000); // Simulate a reply after 1 second
        }
    </script>

</body>
</html>
