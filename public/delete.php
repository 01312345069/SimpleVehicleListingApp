<?php
require_once '../app/Classes/VehicleManager.php';
$vehicleManager = new VehicleManager('../data/vehicles.json');
$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$vehicle = null;

if ($id) {
    $vehicles = $vehicleManager->getVehicles();
    foreach ($vehicles as $v) {
        if ($v['id'] === $id) {
            $vehicle = $v;
            break;
        }
    }
}

include 'views/header.php';
?>
<h2>Delete Vehicle</h2>
<?php if ($vehicle): ?>
    <p>Are you sure you want to delete: "<?php echo htmlspecialchars($vehicle['name']); ?>"?</p>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-danger">Yes Delete</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
<?php else: ?>
    <p>Vehicle not found.</p>
<?php endif; ?>
<?php include 'views/footer.php'; ?>