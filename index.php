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
            margin: auto auto;
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

    <!-- <?php
            if (isset($_GET['productId'])) {
                $id = $_GET['productId'];
                $sql = "SELECT * FROM products WHERE idProduct = '$id'";

                $result = mysqli_query($conn, $sql);
                $productCheck = mysqli_fetch_assoc($result);

                // Khởi tạo và load xml
                $doc = new DOMDocument('1.0', 'utf-8');
                $doc->load('quantity.xml');

                // lấy root node và lấy ra nội dung của của root element
                $root = $doc->documentElement;
                $content = $root->textContent;

                foreach ($root->getElementsByTagName('quantity') as $product) {
                    if ($product->nodeType == XML_ELEMENT_NODE) {
                        echo '<br>' . $product->nodeValue;
                    }
                }
            }

            ?> -->

    <!-- <table>
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
                    <td><img src="<?php echo $product['imageProduct']; ?>" width="100px" /> | <?php echo $product['nameProduct']; ?></td>
                    <td><?php echo $product['priceProduct'] . '/' . $product['unitProduct']; ?></td>
                    <td><a class="btn btn-primary" href="index.php?productId=<?php echo $product['idProduct'] ?>">Check</a></td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table> -->
    <div style="margin-left: 400px;">
        <form action="index.php" method="POST">
            <label>Class ID</label><input type="text" name="classId" placeholder="1,2,3,..."><br>
            <label>Class Name</label><input type="text" name="className" placeholder="Test"><br>
            <label>Quantity</label><input type="text" name="quantity" placeholder="0"><br>
            <input type="submit" name="submit">
        </form>
    </div>

    <?php
        echo "<table border='1' cellspacing='0' cellpadding='0'>";
            echo "<tr align='center'>";
                echo "<td>No.</td>";
                echo "<td>Class Name</td>";
                echo "<td>Quantity</td>";
            echo "</tr>";

            $xml = simplexml_load_file('quantity.xml') or die();
            $i = 1;
            foreach($xml->children() as $value){
                echo "<tr>";
                    echo "<td>".$i++."</td>";
                    echo "<td>".$value->className."</td>";
                    echo "<td>".$value->quantity."</td>";
                echo "</tr>";
            }
        echo "</table>";
    ?>
</body>

</html>