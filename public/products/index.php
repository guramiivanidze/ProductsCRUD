<?php

require_once "../../function.php";
$pdo = require_once '../../database.php';

$keyword = $_GET['search']?? null;

if ($keyword){
    $statement = $pdo->prepare('SELECT * FROM products WHERE title like :keyword ORDER BY create_date DESC');
    $statement->bindValue(":keyword","%$keyword%");
} else {
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');

}

$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);




?>

<?php require_once '../../views/partials/header.php' ?>
    <h1>Producs CRUD</h1>
    <p>
        <a href = "/products/create.php" type="button" class="btn btn-success">ADD</a>
    </p>

<form action="" method="get">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="search" value="<?php echo $keyword;?>">
        <button class="btn btn-outline-secondary" type="submit" >search</button>
    </div>
</form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            <th scope="col">price</th>
            <th scope="col">create Date</th>
            <th scope="col">actione</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($products as $i => $product) { ?>
                <tr>
                    <th scope="row"><?php echo $i +1?></th>
                    <td>
                        <?php if ($product['image']): ?>
                        <img src="/<?php echo $product['image'] ?>" alt=" <?php echo $product['title'] ?> " class="product-image">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $product['title'] ?></td>
                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo $product['create_date'] ?></td>
                    <td>
                        <a href="/products/update.php?id=<?php echo $product['id'] ?> " class="btn btn-outline-primary">edit</a>


                        <form method="post" action="/products/delete.php" style="display: inline">
                            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                            <button type="submit" class="btn btn-outline-danger">delete</button>
                        </form>


                    </td>
                </tr>
           <?php }
        ?>

        </tbody>
    </table>
</body>
</html>