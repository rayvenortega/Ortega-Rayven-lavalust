<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <style>
        :root {
            --bg-1: #f7f1ff;
            --bg-2: #efe4ff;
            --panel: rgba(255, 255, 255, 0.96);
            --primary: #8b5cf6;
            --primary-dark: #6d47d8;
            --primary-soft: #f1e8ff;
            --border: #e9ddff;
            --text: #2d2344;
            --muted: #67598a;
            --shadow: rgba(124, 92, 240, 0.15);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, var(--bg-1), var(--bg-2));
            margin: 0;
            padding: 40px;
            color: var(--text);
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: var(--panel);
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 18px 40px var(--shadow);
            border: 1px solid var(--border);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 25px;
            text-align: center;
            color: var(--primary-dark);
            font-size: 30px;
            font-weight: 700;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 700;
            color: var(--text);
        }

        input,
        textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 14px;
            background: #fff;
            color: var(--text);
            outline: none;
            transition: all 0.2s ease;
        }

        input:focus,
        textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.12);
        }

        input::placeholder,
        textarea::placeholder {
            color: #a792c7;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 3px;
        }

        button {
            border: none;
            padding: 11px 18px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: transform 0.15s ease;
        }

        .save-btn {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 10px 18px rgba(109, 71, 216, 0.2);
        }

        .save-btn:hover {
            transform: translateY(-1px);
        }

        .back-btn {
            background: #ffffff;
            color: var(--muted);
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 10px;
            border: 1px solid var(--border);
            font-weight: 600;
        }

        .back-btn:hover {
            background: var(--primary-soft);
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add Product</h1>

    <form action="<?= site_url('products/store'); ?>" method="POST">
        <?= csrf_field(); ?>

        <label>Product Name</label>
        <input type="text" name="product_name" maxlength="150" placeholder="Enter product name" required>

        <label>Description</label>
        <textarea name="description" maxlength="1000" placeholder="Enter product description" required></textarea>

        <label>Price</label>
        <input type="number" name="price" step="0.01" min="0" placeholder="0.00" required>

        <label>Quantity</label>
        <input type="number" name="quantity" min="0" placeholder="Enter quantity" required>

        <div class="buttons">
            <button type="submit" class="save-btn">Save Product</button>
            <a href="<?= site_url('products'); ?>" class="back-btn">Back</a>
        </div>

    </form>

</div>

</body>
</html>