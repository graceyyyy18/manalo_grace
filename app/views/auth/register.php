<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        font-family: Georgia, serif;
        background: linear-gradient(135deg, #ffdde1, #ee9ca7);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }

    .form-container {
        width: 100%;
        max-width: 420px;
        padding: 40px 30px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        animation: fadeIn 1s ease;
        text-align: center;
    }

    .form-container h2 {
        font-size: 30px;
        margin-bottom: 25px;
        background: linear-gradient(to right, #ec407a, #d81b60);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .form-container input {
        width: 100%;
        padding: 14px 15px;
        margin: 10px 0;
        border: 1px solid #f5c6d6;
        border-radius: 8px;
        font-size: 16px;
        background: #fff5f8;
        transition: all 0.3s ease;
    }

    .form-container input:focus {
        border-color: #e91e63;
        box-shadow: 0 0 6px rgba(233,30,99,0.3);
        outline: none;
        background: #fff;
    }

    .form-container button {
        width: 100%;
        padding: 14px;
        margin-top: 15px;
        background: linear-gradient(to right, #ff6f91, #ff9671);
        color: white;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .form-container button:hover {
        background: linear-gradient(to right, #ff4f7d, #ff7c6d);
        box-shadow: 0 6px 18px rgba(255,111,145,0.4);
    }

    .form-container p {
        margin-top: 18px;
        font-size: 14px;
        color: #555;
    }

    .form-container p a {
        color: #e91e63;
        font-weight: bold;
        text-decoration: none;
    }

    .form-container p a:hover {
        text-decoration: underline;
    }

    .error {
        color: #e74c3c;
        background: #ffe6e6;
        padding: 8px;
        border-radius: 6px;
        font-size: 14px;
        margin-bottom: 12px;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
</style>
</head>
<body>
    <div class="form-container">
        <h2>Create Account</h2>

        <?php if (!empty($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="post" action="/auth/register" enctype="multipart/form-data">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <label style="display:block; text-align:left; margin-top:10px; font-size:14px;">Profile Photo (optional):</label>
            <input type="file" name="photo" accept="image/*">
            <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="/auth/login">Login</a></p>
    </div>
</body>
</html>
