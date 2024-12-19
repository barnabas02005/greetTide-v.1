<?php

require __DIR__ . '/vendor/autoload.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class WebSocketServer implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        // Decode JSON message
        $data = json_decode($msg, true);

        if ($data['action'] == 'login') {
            $this->handleLogin($from, $data['displayname'], $data['password']);
        } elseif ($data['action'] == 'signup') {
            $this->handleSignup($from, $data['displayname'], $data['password']);
        } else {
            // Handle other actions as needed
        }
    }

    protected function handleLogin(ConnectionInterface $from, $displayname, $password)
    {
        // Implement your MySQLi logic for login here
        // Replace 'your_database_host', 'your_database_displayname', 'your_database_password', and 'your_database_name'
        $mysqli = new mysqli('localhost', 'root', '', 'testing_websocket');

        if ($mysqli->connect_error) {
            $from->send(json_encode(['error' => 'Database connection error']));
            return;
        }

        $query = "SELECT * FROM members WHERE displayname = ? AND password = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ss', $displayname, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $from->send(json_encode(['success' => 'Login successful']));
        } else {
            $from->send(json_encode(['error' => 'Invalid credentials']));
        }

        $stmt->close();
        $mysqli->close();
    }

    protected function handleSignup(ConnectionInterface $from, $displayname, $password)
    {
        // Implement your MySQLi logic for signup here
        // Replace 'your_database_host', 'your_database_displayname', 'your_database_password', and 'your_database_name'
        $mysqli = new mysqli('localhost', 'root', '', 'testing_websocket');

        if ($mysqli->connect_error) {
            $from->send(json_encode(['error' => 'Database connection error']));
            return;
        }

        $query = "INSERT INTO members (displayname, password) VALUES (?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ss', $displayname, $password);
        $stmt->execute();

        $from->send(json_encode(['success' => 'Signup successful']));

        $stmt->close();
        $mysqli->close();
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}

// Run the WebSocket server
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new WebSocketServer()
        )
    ),
    8080
);

echo "WebSocket server started at 0.0.0.0:8080\n";

$server->run();
