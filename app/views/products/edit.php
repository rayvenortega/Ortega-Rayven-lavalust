<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Product</title>

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

    <h1>Edit Product</h1>

    <?php if (!empty($product)): ?>

        <form
            action="<?= site_url('products/update/' . $product['id']); ?>"
            method="POST"
        >
            <?= csrf_field(); ?>

            <label for="product_name">
                Product Name
            </label>

            <input
                type="text"
                id="product_name"
                name="product_name"
                value="<?= htmlspecialchars($product['product_name']); ?>"
                required
            >


            <label for="description">
                Description
            </label>

            <textarea
                id="description"
                name="description"
                required
            ><?= htmlspecialchars($product['description']); ?></textarea>


            <label for="price">
                Price
            </label>

            <input
                type="number"
                id="price"
                name="price"
                step="0.01"
                min="0"
                value="<?= htmlspecialchars($product['price']); ?>"
                required
            >


            <label for="quantity">
                Quantity
            </label>

            <input
                type="number"
                id="quantity"
                name="quantity"
                min="0"
                value="<?= htmlspecialchars($product['quantity']); ?>"
                required
            >


            <div class="buttons">

                <button
                    type="submit"
                    class="save-btn"
                >
                    Update Product
                </button>

                <a
                    href="<?= site_url('products'); ?>"
                    class="back-btn"
                >
                    Back
                </a>

            </div>

        </form>

    <?php else: ?>

        <p>Product not found.</p>

        <a
            href="<?= site_url('products'); ?>"
            class="back-btn"
        >
            Back to Products
        </a>

    <?php endif; ?>

</div>

</body>

</html>