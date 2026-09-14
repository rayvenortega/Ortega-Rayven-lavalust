<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        :root {
            --bg-1: #f5f1ff;
            --bg-2: #efe7ff;
            --panel: rgba(255, 255, 255, 0.9);
            --panel-strong: #ffffff;
            --primary: #8b5cf6;
            --primary-dark: #6d47d8;
            --primary-soft: #f1e8ff;
            --border: #e5d9ff;
            --text: #2d2344;
            --muted: #67598a;
            --danger-bg: #fdf2f8;
            --danger-text: #8b2e5f;
            --shadow: rgba(124, 92, 240, 0.18);
        }

        * { box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--bg-1), var(--bg-2));
            color: var(--text);
        }

        .login-box {
            width: 100%;
            max-width: 420px;
            background: var(--panel);
            backdrop-filter: blur(8px);
            padding: 30px 28px;
            border-radius: 18px;
            box-shadow: 0 18px 45px var(--shadow);
            border: 1px solid var(--border);
        }

        h2 {
            margin: 0 0 24px;
            text-align: center;
            color: var(--primary-dark);
            font-size: 2rem;
            letter-spacing: 0.04em;
        }

        .alert {
            background: var(--danger-bg);
            color: var(--danger-text);
            border: 1px solid #f5d1e1;
            border-radius: 10px;
            padding: 10px 12px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: var(--text);
        }

        input {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 18px;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 15px;
            background: rgba(255, 255, 255, 0.8);
            color: var(--text);
            transition: all 0.2s ease;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.12);
        }

        button {
            width: 100%;
            border: none;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 12px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 10px 20px rgba(109, 71, 216, 0.25);
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        button:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 22px rgba(109, 71, 216, 0.28);
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>

        <?php if (!empty($error)): ?>
            <div class="alert"><?= htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="<?= site_url('login'); ?>">
            <?= csrf_field(); ?>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" maxlength="50" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" minlength="6" maxlength="255" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
