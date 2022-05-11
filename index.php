<?php require 'handle.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="styles.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 100px auto;
        }

        th,
        td {
            height: 50px;
            vertical-align: center;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);

    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <?php
    if (isset($_GET['productId'])) {
        $id = $_GET['productId'];
        $sql = "SELECT * FROM products WHERE idProduct = '$id'";

        $result = mysqli_query($conn, $sql);
        $productCheck = mysqli_fetch_assoc($result);

        $doc = new DOMDocument('1.0', 'utf-8');
        $doc->load('quantity.xml');

        $root = $doc->documentElement;

        $list = $root->getElementsByTagName("productId");
        $flag = 0;
        foreach ($list as $proId) {
            if ($proId->nodeValue == $id) {
            }
        }
    }

    ?>

    <table>
        <thead>
            <th>No.</th>
            <th>Product name</th>
            <th>Price</th>
            <th>Check quantity</th>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><img src="<?php echo $product['imageProduct']; ?>" width="100px"> | <?php echo $product['nameProduct']; ?></td>
                    <td><?php echo $product['priceProduct'] . '/' . $product['unitProduct']; ?></td>
                    <td><a class="btn btn-primary" href="index.php?productId=<?php echo $product['idProduct'] ?>">Check</a></td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</body>

</html>