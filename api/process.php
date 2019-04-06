<?php
$commonMessage = parse_ini_file("../common.ini");
require '../db/DB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateReceiveItems'])) {
	$order_id = $_POST['updateReceiveItems'];

	// Add quantity from orders to book inventory
	// Get from database corresponding book_id and qty_on_hand

	$count = 0;
	$sql = "SELECT DISTINCT(books_inventory.book_id), books_inventory.qty_on_hand
		FROM books_inventory, order_items 
		WHERE ? = order_items.order_id AND order_items.book_id = books_inventory.book_id;";
	$stmt = DB::getInstance()->prepare($sql);
	if($stmt->execute([$order_id]) == 1){
$count++;

}

	$temp = $stmt->fetchAll();
	// Get from database the qty delivered in the order
	$sql = "SELECT quantity 
		FROM order_items 
		WHERE order_items.order_id = ?;";
	$stmt = DB::getInstance()->prepare($sql);
	if($stmt->execute([$order_id]) == 1){$count++;};
	$qty = $stmt->fetchAll();
	$qty .= $temp['qty_on_hand']; // total quantity
	// Update in database the qty of books
	$sql = "UPDATE books_inventory SET qty_on_hand = ? WHERE book_id = ?;";
	$stmt = DB::getInstance()->prepare($sql);
	if($stmt->execute([$qty,$temp['book_id']]) ==1){$count++;};

	// Delete a row in orders table corresponding to order_id
	$sql = "SET FOREIGN_KEY_CHECKS=0;DELETE FROM orders WHERE order_id=?;SET FOREIGN_KEY_CHECKS=1;";
	$stmt = DB::getInstance()->prepare($sql);
	if($stmt->execute([$order_id]) == 1){$count++;};

echo $count;
/*

	if($count == 4){
	    echo ("success");
	    }*/

}
?>
