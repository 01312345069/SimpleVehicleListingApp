<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="<?php echo htmlspecialchars($vehicle['image']); ?>" class="img-fluid rounded-start"
                alt="<?php echo htmlspecialchars($vehicle['name']); ?>">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($vehicle['name']); ?></h5>
                <p class="card-text">Price: $<?php echo number_format($vehicle['price']); ?></p>
                <div class="d-flex justify-content-between">
                    <a href="edit.php?id=<?php echo $vehicle['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete.php?id=<?php echo $vehicle['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>