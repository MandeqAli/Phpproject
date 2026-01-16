<?php
// contact.php

// ---------------- DB CONNECTION ----------------
function getDBConnection() {
    $host = "localhost";
    $db   = "pharmacy";
    $user = "root";
    $pass = "";
    $dsn  = "mysql:host=$host;dbname=$db;charset=UTF8";

    return new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}

// ---------------- FORM LOGIC ----------------
$statusMsg = "";
$statusClass = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name    = trim($_POST["name"] ?? "");
    $email   = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name === "" || $email === "" || $message === "") {
        $statusMsg = "❌ Please fill all fields.";
        $statusClass = "error";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $statusMsg = "❌ Invalid email address.";
        $statusClass = "error";

    } else {
        try {
            // ✅ Save to DB
            $db = getDBConnection();
            $stmt = $db->prepare(
                "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)"
            );
            $stmt->execute([$name, $email, $message]);

            // ✅ Send email
            $to = "youremail@example.com";
            $subject = "New Contact Message - Mecura Pharmacy";
            $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
            $headers = "From: $email\r\nReply-To: $email";

            mail($to, $subject, $body, $headers);

            $statusMsg = "✅ Message sent successfully!";
            $statusClass = "success";

            $name = $email = $message = "";

        } catch (Exception $e) {
            $statusMsg = "❌ Server error. Try again later.";
            $statusClass = "error";
        }
    }
}
?>
