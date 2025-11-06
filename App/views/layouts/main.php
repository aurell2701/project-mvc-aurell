<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'MVC App' ?></title>
    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #3498db;
            --light-bg: #f4f6f8;
            --text-color: #333;
            --border-radius: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            line-height: 1.6;
            background: var(--light-bg);
            color: var(--text-color);
        }

        nav {
            background: var(--primary-color);
            color: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        nav .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 1.5rem;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav a:hover {
            color: var(--accent-color);
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            text-align: center;
            padding: 1rem;
            margin-top: 3rem;
            font-size: 0.9rem;
            color: #777;
        }

        @media (max-width: 768px) {
            nav .nav-container {
                flex-direction: column;
                align-items: flex-start;
            }

            nav a {
                margin: 0.5rem 0;
            }

            .container {
                margin: 1rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-container">
            <div class="logo"><strong><?= $title ?? 'MVC App' ?></strong></div>
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="/users">Users</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <?= $content ?? '' ?>
    </div>

    <footer>
        &copy; <?= date('Y') ?> MVC App. All rights reserved.
    </footer>
</body>
</html>
