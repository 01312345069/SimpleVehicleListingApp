<?php
require_once 'VehicleActions.php';
require_once 'VehicleBase.php';
require_once 'FileHandler.php';

class VehicleManager extends VehicleBase implements VehicleActions
{
    use FileHandler;

    public function __construct($file_path)
    {
        parent::__construct('', '', 0, '');
        $this->file_path = $file_path;
    }

    public function addVehicle(array $data)
    {
        $vehicles = $this->readJson();
        $data['id'] = count($vehicles) + 1; // Simple ID assignment
        $vehicles[] = $data;
        return $this->writeJson($vehicles);
    }

    public function editVehicle(int $id, array $data)
    {
        $vehicles = $this->readJson();
        $index = array_search($id, array_column($vehicles, 'id'));
        if ($index !== false) {
            $vehicles[$index] = array_merge($vehicles[$index], $data);
            return $this->writeJson($vehicles);
        }
        return false;
    }

    public function deleteVehicle(int $id)
    {
        $vehicles = $this->readJson();
        foreach ($vehicles as $key => $vehicle) {
            if ($vehicle['id'] === $id) {
                unset($vehicles[$key]);
                $vehicles = array_values($vehicles); // Re-index array
                return $this->writeJson($vehicles);
            }
        }
        return false;
    }

    public function getVehicles()
    {
        return $this->readJson();
    }

    public function getDetails()
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
            'image' => $this->image
        ];
    }
}
?>