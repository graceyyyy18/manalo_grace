<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Georgia, serif;
      background: linear-gradient(135deg, #fce4ec, #f8bbd0, #f48fb1);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .login-form {
      width: 100%;
      max-width: 400px;
      padding: 40px 30px;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 12px 30px rgba(0,0,0,0.15);
      animation: fadeIn 0.8s ease forwards;
      text-align: center;
    }

    .login-form h2 {
      font-size: 28px;
      font-weight: bold;
      background: linear-gradient(to right, #ec407a, #d81b60);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 10px;
    }

    .login-form p.subtext {
      font-size: 14px;
      color: #555;
      margin-bottom: 25px;
    }

    .form-group {
      position: relative;
      margin-bottom: 20px;
    }

    .form-group input {
      width: 100%;
      padding: 14px 16px;
      border: 1px solid #e0e0e0;
      border-radius: 10px;
      font-size: 16px;
      background-color: #fafbfc;
      transition: 0.3s;
    }

    .form-group input:focus {
      border-color: #ec407a;
      box-shadow: 0 0 8px rgba(236, 64, 122, 0.3);
      outline: none;
      background-color: #fff;
    }

    .login-form button {
      width: 100%;
      padding: 14px;
      background: linear-gradient(to right, #ec407a, #d81b60);
      border: none;
      border-radius: 10px;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s ease;
      margin-top: 10px;
    }

    .login-form button:hover {
      opacity: 0.95;
      box-shadow: 0 6px 20px rgba(216, 27, 96, 0.4);
    }

    .login-form .error {
      color: #c62828;
      background: #ffebee;
      padding: 10px 15px;
      border-radius: 6px;
      font-size: 14px;
      margin-bottom: 18px;
    }

    @keyframes fadeIn {
      0% { opacity: 0; transform: scale(0.95); }
      100% { opacity: 1; transform: scale(1); }
    }
  </style>
</head>
<body>
  <div class="login-form">
    <h2>Sign In</h2>
    <p class="subtext">Access your account using your email and password.</p>

    <?php if (!empty($error)): ?>
      <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="/auth/login">
      <div class="form-group">
        <input type="email" name="email" placeholder="Email Address" required>
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <button type="submit">Sign In</button>
    </form>
  </div>
</body>
</html>
