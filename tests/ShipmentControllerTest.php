<?php
require '../db/DB.php';
require '../model/Book.php';
require '../model/Publisher.php';
require '../model/BookInventory.php';
require '../model/Shipment.php';

require '../controller/BookController.php';
require '../controller/PublisherController.php';
require '../controller/BookInventoryController.php';
require '../controller/ShipmentController.php';


class ShipmentControllerTest extends PHPUnit_Framework_TestCase
{

    public function testFetchShipments()
    {
        $shController = new ShipmentController();
        print_r($shController->fetchShipments());
    }

    public function testSave()
    {
        $shipment = new Shipment();
        $shipment->setBookId(1);
        $shipment->setPublisherId(2);
        $shipment->setQtyToReceive(23);
        $shipment->setDateShipped('2019-03-29');

        $shController = new ShipmentController();
        $shController->save($shipment);
    }

    public function testUpdate()
    {
        // shipment with id #8, updates book inventory with id #3,
        // currently book id 3 has 39 units in the inventory
        // adding 42 more = 81 (expected quantity on hand in the inventory)
        $shipment = new Shipment();
        $shipment->setShipmentId(8);
        $shController = new ShipmentController();

        $sObj = new Shipment();
        $sObj = $shController->fetchShipmentById($shipment)[0];

        $shController->update($sObj);

        // now check if shipment with id #8 has status received 1...
        print_r($shController->fetchShipmentById($shipment));
    }

    public function testReceiveShipmentTab()
    {
        $shController = new ShipmentController();
        print_r($shController->fetchShipmentsToReceive());
    }
}
