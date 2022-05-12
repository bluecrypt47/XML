<?php
if (!isset($_SESSION)) {
    session_start();
}
header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'shop') or die('Connection fail!');
mysqli_set_charset($conn, "utf8");

if (isset($_POST['submit'])) {
    $id = $_POST['classId'];
    $className = $_POST['className'];
    $quantity = $_POST['quantity'];

    $doc = new DOMDocument('1.0', 'utf-8');
    $doc->load('quantity.xml');

    $root = $doc->documentElement;
    $lists = $root->getElementsByTagName("classId");

    $flag = 0;

    foreach ($lists as $list) {
        if ($list->nodeValue == $id) {
            $flag = 1;
            break;
        }
    }

    if ($flag == 0) {
        $class_node = $doc->createElement('class');

        $classId_node = $doc->createElement('classId');
        $classId_node->nodeValue = $id;

        $className_node = $doc->createElement('className');
        $className_node->nodeValue = $className;

        $quantity_node = $doc->createElement('quantity');
        $quantity_node->nodeValue = $quantity;

        $class_node->appendChild($classId_node);
        $class_node->appendChild($className_node);
        $class_node->appendChild($quantity_node);

        $root->appendChild($class_node);

        $doc->save('quantity.xml');

        $xml = simplexml_load_file('quantity.xml');
        $doc->preserveWhiteSpace = true;
        $doc->formatOutput = true;
        $doc->loadXML($xml->asXML(), LIBXML_NOBLANKS);

        $doc->save('quantity.xml');
    }
    // header("Localhost:index.php");
}
