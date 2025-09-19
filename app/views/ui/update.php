<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Student</title>
<style>
* { box-sizing: border-box; margin: 0; padding: 0; }
body {
    font-family: Georgia, serif; /* ✅ Changed to Georgia */
    background: linear-gradient(135deg, #fce4ec, #f8bbd0, #f48fb1);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}
.container {
    background: #fff;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    width: 100%;
    max-width: 480px;
    text-align: center;
    transition: transform 0.3s ease;
}
.container:hover {
    transform: translateY(-6px);
}
h2 {
    font-size: 26px;
    color: #880e4f;
    margin-bottom: 25px;
    font-weight: 700;
}
form {
    text-align: left;
}
label {
    font-weight: 600;
    display: block;
    margin-bottom: 6px;
    color: #ad1457;
}
input[type="text"],
input[type="email"],
input[type="password"],
input[type="file"] {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #ddd;
    border-radius: 8px;
    margin-bottom: 18px;
    font-size: 15px;
    transition: border 0.3s, box-shadow 0.3s;
    font-family: Georgia, serif; /* ✅ Inputs in Georgia */
}
input:focus {
    border-color: #ec407a;
    box-shadow: 0 0 6px rgba(236,64,122,0.3);
    outline: none;
}
button[type="submit"] {
    width: 100%;
    padding: 14px;
    background: linear-gradient(to right, #ec407a, #d81b60);
    border: none;
    border-radius: 8px;
    color: #fff;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: Georgia, serif; /* ✅ Button in Georgia */
}
button[type="submit"]:hover {
    opacity: 0.95;
    box-shadow: 0 6px 18px rgba(216,27,96,0.4);
}
.photo-preview {
    margin: 10px 0 18px;
    text-align: center;
}
.photo-preview img {
    border: 2px solid #ec407a;
    border-radius: 10px;
    padding: 3px;
    max-width: 100px;
    box-shadow: 0 4px 12px rgba(236,64,122,0.3);
}
.back-link {
    display: inline-block;
    margin-top: 20px;
    color: #d81b60;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.3s;
    font-family: Georgia, serif; /* ✅ Back link in Georgia */
}
.back-link:hover {
    color: #ff53afff;
    text-decoration: underline;
}
</style>
</head>
<body>
<div class="container">
    <h2>Edit Student</h2>

    <form method="post" action="/students/update/<?= (int) $user['id'] ?>" enctype="multipart/form-data">
        <label>First Name:</label>
        <input type="text" name="first_name" value="<?= htmlspecialchars($user['first_name']) ?>" required>

        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?= htmlspecialchars($user['last_name']) ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

        <label>Password (leave it blank):</label>
        <input type="password" name="password">

        <label>Photo:</label>
        <?php if (!empty($user['photo'])): ?>
            <div class="photo-preview">
                <img src="<?= $upload_url . htmlspecialchars($user['photo']) ?>" alt="Student Photo">
            </div>
        <?php endif; ?>
        <input type="file" name="photo" accept="image/*">

        <button type="submit">Update</button>
    </form>

    <a class="back-link" href="/students/get-all">Back to students</a>
</div>
</body>
</html>
