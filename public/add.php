<?php
include 'views/header.php';
?>
<h2>Add Vehicle</h2>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="add">
    <div class="mb-3">
        <label for="name" class="form-label">Vehicle Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Vehicle Price</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Vehicle URL Image</label>
        <input type="url" class="form-control" id="image" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Vehicle</button>
</form>
<?php include 'views/footer.php'; ?>