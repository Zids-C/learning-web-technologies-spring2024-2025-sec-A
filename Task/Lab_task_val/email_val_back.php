<?php
    function validate_email($email) {
        if (empty($email)) {
            return "Email can't be empty!";
        }

        if (strpos($email, ' ') !== false) {
            return "Email can't contain spaces!";
        }

        if (substr_count($email, '@') != 1) {
            return "Email must contain @!";
        }

        $parts = explode('@', $email);
        if (strlen($parts[0]) < 1) {
            return "Email must contain a username!";
        }

        if (substr_count($parts[1], '.') < 1) {
            return "Email must contain a domain!";
        }

        // Check for valid characters
        for ($i = 0; $i < strlen($email); $i++) {
            if (!ctype_alpha($email[$i]) && !ctype_digit($email[$i]) && $email[$i] !== '.' && $email[$i] !== '@') {
                return "Email can contain only letters (a-z), numbers (0-9), dot (.), or @";
            }
        }

        return "Valid email!";
    }

    // Example usage:
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'] ?? '';
        $message = validate_email($email);
        echo "<p style='color: red;'>$message</p>";
    }
?>
