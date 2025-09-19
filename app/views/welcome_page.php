<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to LavaLust</title>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", sans-serif;
            background: linear-gradient(135deg, #ffdde1, #ee9ca7);
            color: #4a4a4a;
        }

        .container {
            max-width: 960px;
            margin: 3rem auto;
            background: #ffffff;
            border: 1px solid #f8cdda;
            border-radius: 10px;
            box-shadow: 0 6px 25px rgba(255,105,135,0.2);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(to right, #ff758c, #ff7eb3);
            color: #ffffff;
            padding: 2rem;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        .main {
            padding: 2rem;
        }

        h2 {
            color: #d81b60;
            margin-top: 2rem;
        }

        p {
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        code, pre {
            display: block;
            background: #fff0f5;
            padding: 1rem;
            border-left: 4px solid #ff80ab;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: #4a154b;
            overflow-x: auto;
            border-radius: 6px;
        }

        ul {
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }

        li {
            margin-bottom: 0.5rem;
        }

        a {
            color: #e91e63;
            font-weight: 600;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
            color: #ad1457;
        }

        .footer {
            font-size: 0.9rem;
            text-align: center;
            padding: 1rem;
            background: #fff0f5;
            border-top: 1px solid #f8cdda;
            color: #444;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1rem;
        }

        .card {
            background: #fffafc;
            padding: 1rem;
            border-radius: 8px;
            border: 1px solid #f8cdda;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(255,105,135,0.25);
        }

        .card h3 {
            margin-top: 0;
            color: #ad1457;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔥 LavaLust Framework</h1>
            <p>Lightweight • Fast • MVC for PHP Developers</p>
        </div>

        <div class="main">
            <h2>What is LavaLust?</h2>
            <p><strong>LavaLust</strong> is a lightweight PHP framework that follows the MVC (Model–View–Controller) pattern. It's designed for developers who want a structured yet minimalistic PHP development experience.</p>

            <h2>🚀 Key Features</h2>
            <div class="grid">
                <div class="card">
                    <h3>🧠 MVC Architecture</h3>
                    <p>Clear separation of concerns with Models, Views, and Controllers.</p>
                </div>
                <div class="card">
                    <h3>⚙️ Built-in Routing</h3>
                    <p>Clean and flexible routing system similar to Laravel or CodeIgniter.</p>
                </div>
                <div class="card">
                    <h3>📦 Libraries & Helpers</h3>
                    <p>Includes utilities for sessions, forms, database, validation, and more.</p>
                </div>
                <div class="card">
                    <h3>📁 Organized Structure</h3>
                    <p>Modular folder structure for scalable app development.</p>
                </div>
                <div class="card">
                    <h3>🔗 REST API Support</h3>
                    <p>Build RESTful APIs easily using built-in tools and conventions.</p>
                </div>
                <div class="card">
                    <h3>📘 ORM-like Models</h3>
                    <p>Use LavaLust's model layer for structured database operations with ease.</p>
                </div>
            </div>

            <h2>📂 Project Structure</h2>
            <pre><code>
/app
  /config
  /controllers
  /helpers
  /language
  /libraries
  /models
  /views
/console
/public
/runtime
/scheme
            </code></pre>

            <h2>🧪 Quick Example</h2>
                <p>Route in <code>app/config/routes.php</code></p>
<pre><code>
$router->get('/', 'Welcome::index');
</code></pre>
            <p>Controller method in <code>app/controllers/Welcome.php</code>:</p>
            <pre><code>
class Welcome extends Controller {
    public function index() {
        $this->call->view('welcome_page');
    }
}
            </code></pre>

            <p>View file at: <code>app/Views/welcome_page.php</code></p>

            <h2>📚 Learn More</h2>
            <ul>
                <li><a href="https://github.com/ronmarasigan/LavaLust">GitHub Repository</a></li>
                <li><a href="https://lavalust.netlify.app/">Official Documentation</a></li>
            </ul>
        </div>

        <div class="footer">
            Page rendered in <strong><?php echo lava_instance()->performance->elapsed_time('lavalust'); ?></strong> seconds.
            Memory usage: <?php echo lava_instance()->performance->memory_usage(); ?>.
            <?php if(config_item('ENVIRONMENT') === 'development'): ?>
                <br>LavaLust Version <strong><?php echo config_item('VERSION'); ?></strong>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
