<?php
trait FileHandler
{
    private $file_path;

    public function __construct($path)
    {
        $this->file_path = $path;
    }

    public function readJson()
    {
        if (file_exists($this->file_path)) {
            $json_data = file_get_contents($this->file_path);
            return json_decode($json_data, true) ?? [];
        }
        return [];
    }

    public function writeJson($data)
    {
        $json_data = json_encode($data, JSON_PRETTY_PRINT);
        if ($json_data !== false) {
            return file_put_contents($this->file_path, $json_data) !== false;
        }
        return false;
    }
}
?>