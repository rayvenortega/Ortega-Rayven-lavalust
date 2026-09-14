<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Product Management</title>

    <style>
        :root {
            --bg-1: #f7f1ff;
            --bg-2: #efe4ff;
            --panel: #ffffff;
            --panel-alt: #f9f4ff;
            --primary: #8b5cf6;
            --primary-dark: #6d47d8;
            --primary-soft: #f1e8ff;
            --border: #e9ddff;
            --text: #2d2344;
            --muted: #6d5f8a;
            --danger: #d946ef;
            --danger-soft: #fdf0ff;
            --shadow: rgba(109, 71, 216, 0.12);
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
            max-width: 1100px;
            margin: auto;
            background: var(--panel);
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 18px 40px var(--shadow);
            border: 1px solid var(--border);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 16px;
        }

        h1 {
            margin: 0;
            color: var(--primary-dark);
            font-size: 30px;
            font-weight: 700;
        }

        .add-btn {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 11px 18px;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.2s;
            box-shadow: 0 10px 18px rgba(109, 71, 216, 0.22);
        }

        .add-btn:hover {
            transform: translateY(-1px);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #fff;
        }

        th,
        td {
            padding: 14px 12px;
            border-bottom: 1px solid #f0e7ff;
            text-align: left;
        }

        th {
            background: var(--primary-soft);
            color: var(--primary-dark);
            font-weight: 700;
            border-bottom: 2px solid var(--border);
        }

        tbody tr:hover {
            background: #faf7ff;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        td:last-child {
            white-space: nowrap;
            width: 180px;
        }

        .edit-btn,
        .delete-btn {
            display: inline-block;
            padding: 8px 13px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            margin-right: 6px;
            vertical-align: middle;
            transition: 0.2s;
        }

        .edit-btn {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
        }

        .delete-btn {
            background: var(--danger-soft);
            color: #8b4a8f;
            border: 1px solid #f0d7f7;
        }

        .delete-btn:hover {
            background: #fbe8ff;
            border-color: #e7c9f4;
        }

        .empty {
            text-align: center;
            padding: 25px;
            color: var(--muted);
        }
    </style>

</head>


<body>


<div class="container">


    <div class="header">

        <h1>Product Management</h1>

        <div style="display: flex; align-items: center; gap: 12px;">
            <a href="<?php echo site_url('products/create'); ?>" class="add-btn">
                + Add Product
            </a>
            <a href="<?php echo site_url('logout'); ?>" class="delete-btn" style="margin-right: 0;" onclick="return confirm('Are you sure you want to log out?');">
                Logout
            </a>
        </div>

    </div>


    <table>

        <thead>

            <tr>

                <th>ID</th>

                <th>Product Name</th>

                <th>Description</th>

                <th>Price</th>

                <th>Quantity</th>

                <th>Actions</th>

            </tr>

        </thead>


        <tbody>

        <?php if (!empty($products)): ?>

            <?php foreach ($products as $product): ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($product['id']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($product['product_name']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($product['description']); ?>
                    </td>

                    <td>
                        ₱<?= number_format($product['price'], 2); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($product['quantity']); ?>
                    </td>

                    <td>

                        <!-- EDIT -->

                        <a
                            href="<?= site_url('products/edit/' . $product['id']); ?>"
                            class="edit-btn"
                        >
                            Edit
                        </a>


                        <!-- DELETE -->

                        <a
                            href="<?= site_url('products/delete/' . $product['id']); ?>"
                            class="delete-btn"
                            onclick="return confirm('Are you sure you want to delete this product?');"
                        >
                            Delete
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>

                <td
                    colspan="6"
                    class="empty"
                >
                    No products found.
                </td>

            </tr>

        <?php endif; ?>

        </tbody>

    </table>


</div>


</body>

</html>