<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSocket Client</title>
</head>
<body>
    <h1>WebSocket Client</h1>
    <div id="loginContainer">
        <form id="loginForm">
            <label for="displayname">displayname:</label>
            <input type="text" id="displayname" required>
            <label for="password">Password:</label>
            <input type="password" id="password" required>
            <button type="button" onclick="login()">Login</button>
        </form>

        <form id="signupForm">
            <label for="newdisplayname">New displayname:</label>
            <input type="text" id="newdisplayname" required>
            <label for="newPassword">New Password:</label>
            <input type="password" id="newPassword" required>
            <button type="button" onclick="signup()">Signup</button>
        </form>
    </div>

    <div id="contentContainer" style="display: none;">
        <iframe id="content" src="" frameborder="0" width="100%" height="500px"></iframe>
    </div>

    <script>
        const socket = new WebSocket('ws://localhost:8080/signup_login.php');

        socket.addEventListener('open', function (event) {
            console.log('WebSocket connection opened.');
        });

        socket.addEventListener('message', function (event) {
            // Handle messages from the server
            const data = JSON.parse(event.data);

            if (data.success) {
                // Load content dynamically based on the URL
                loadContent('home.html');
            }

            console.log('Message from server:', data);
        });

        function login() {
            const displayname = document.getElementById('displayname').value;
            const password = document.getElementById('password').value;

            const data = {
                action: 'login',
                displayname: displayname,
                password: password
            };

            socket.send(JSON.stringify(data));
        }

        function signup() {
            const newdisplayname = document.getElementById('newdisplayname').value;
            const newPassword = document.getElementById('newPassword').value;

            const data = {
                action: 'signup',
                displayname: newdisplayname,
                password: newPassword
            };

            socket.send(JSON.stringify(data));
        }

        function loadContent(url) {
            // Hide the login/signup forms and show the content container
            document.getElementById('loginContainer').style.display = 'none';
            document.getElementById('contentContainer').style.display = 'block';

            // Set the iframe source to the specified URL
            document.getElementById('content').src = url;
        }
    </script>
</body>
</html>