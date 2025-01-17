<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <style>
        /* Reset margin and padding */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .login-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 1rem;
            color: #4A90E2;
        }

        .login-container label {
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            display: block;
        }

        .login-container input[type="username"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        .login-container button {
            background-color: #4A90E2;
            color: white;
            padding: 0.8rem;
            width: 100%;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-container button:hover {
            background-color: #357ABD;
        }

        .login-container p {
            margin-top: 1rem;
            color: red;
            font-size: 0.9rem;
            text-align: center;
        }

        @media (max-width: 500px) {
            .login-container {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="index.php" method="POST">
            <label for="username">Username</label> 
            <input type="username" id="username" name="username" placeholder="Masukan Username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukan Password" required>
            <button type="submit">Login</button>
        </form>
        <?php
        if (isset($_GET['status']) && $_GET['status'] == 'gagal') {
            echo "<p>Email atau password salah!</p>";
        }
        ?>
    </div>
</body>
</html>
