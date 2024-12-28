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
<h2>Edit Vehicle</h2>
<?php if ($vehicle): ?>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Vehicle Name</label>
            <input type="text" class="form-control" id="name" name="name"
                value="<?php echo htmlspecialchars($vehicle['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Vehicle Price</label>
            <input type="number" class="form-control" id="price" name="price"
                value="<?php echo htmlspecialchars($vehicle['price']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Vehicle URL Image</label>
            <input type="url" class="form-control" id="image" name="image"
                value="<?php echo htmlspecialchars($vehicle['image']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Edit Vehicle</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
<?php else: ?>
    <p>Vehicle not found.</p>
<?php endif; ?>
<?php include 'views/footer.php'; ?>