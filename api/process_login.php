<?php
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the username and password fields are not empty
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Make a request to the API to authenticate the user
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.baubuddy.de/index.php/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"username\":\"$username\", \"password\":\"$password\"}",
            CURLOPT_HTTPHEADER => [
                "Authorization: Basic QVBJX0V4cGxvcmVyOjEyMzQ1NmlzQUxhbWVQYXNz",
                "Content-Type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            // If there was an error, display an error message
            $_SESSION["error"] = "There was an error logging in. Please try again later.";
            header("Location: ../auth/login.php");
            exit();
        } else if ($status_code == 200) {
            // If the request was successful, save the access token to the session and redirect to the home page
            $json_response = json_decode($response, true);
            $access_token = $json_response['oauth']['access_token'];
            $expires_in = $json_response['oauth']['expires_in'];
            $token_expiry = time() + $expires_in;
            $_SESSION['access_token_exp_time'] = $token_expiry;
            $_SESSION['access_token'] = $access_token;
            header("Location: ../index.php");
            exit();
        } else {
            // If the request was not successful, display an error message
            $json_response = json_decode($response, true);
            $_SESSION["error"] = 'Username or password is incorrect.';
            header("Location: ../auth/login.php");
            exit();
        }
    } else {
        // If the username or password fields are empty, display an error message
        $_SESSION["error"] = "Please enter a username and password.";
        header("Location: ../auth/login.php");
        exit();
    }
}
?>
