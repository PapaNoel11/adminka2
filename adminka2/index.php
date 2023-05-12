<link rel="stylesheet" href="style.css">
<form method="post" action="authcheck.php">
    <div>
        <label for="username">Логин:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <button type="submit">Войти</button>
    </div>
</form>

<?php
$db_connection = mysqli_connect("localhost", "root", "", "adminka");


$sql_categories = "SELECT id, name FROM categories";
$result_categories = mysqli_query($db_connection, $sql_categories);


$sql_products = "SELECT products.id, products.name, products.price, categories.name AS category_name, products.show_date FROM products LEFT JOIN categories ON products.category_id = categories.id";
$result_products = mysqli_query($db_connection, $sql_products);



echo '<table>
    <tr>
        <th>ID</th>
        <th>Название постановки</th>
        <th>Жанр</th>
        <th>Дата показа</th>
        <th>Цена</th>
    </tr>';
while ($product = mysqli_fetch_assoc($result_products)) {
    echo '<tr>
            <td>' . $product['id'] . '</td>
            <td>' . $product['name'] . '</td>
            <td>' . $product['category_name'] . '</td>
            <td>' . $product['show_date'] . '</td>
            <td>' . $product['price'] . '</td>
        </tr>';
}
echo '</table>';