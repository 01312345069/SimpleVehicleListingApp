<?php
interface VehicleActions
{
    public function addVehicle(array $data);
    public function editVehicle(int $id, array $data);
    public function deleteVehicle(int $id);
    public function getVehicles();
}
?>