<?php
require_once '../app/Classes/VehicleManager.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$vehicleManager = new VehicleManager('../data/vehicles.json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                if ($vehicleManager->addVehicle($_POST)) {
                    header('Location: index.php');
                    exit;
                }
                break;
            case 'edit':
                if (isset($_POST['id']) && $vehicleManager->editVehicle((int) $_POST['id'], $_POST)) {
                    header('Location: index.php');
                    exit;
                }
                break;
            case 'delete':
                if (isset($_POST['id']) && $vehicleManager->deleteVehicle((int) $_POST['id'])) {
                    header('Location: index.php');
                    exit;
                }
                break;
        }
    }
}

$vehicles = $vehicleManager->getVehicles();
include 'views/header.php';

if (!empty($vehicles)) {
    foreach ($vehicles as $vehicle) {
        include 'views/vehicle_card.php';
    }
} else {
    echo "<p>No vehicles listed yet.</p>";
}

echo '<a href="add.php" class="btn btn-primary">Add Vehicle</a>';

include 'views/footer.php';
?>