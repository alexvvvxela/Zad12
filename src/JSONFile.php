<?php
namespace Alexv\Zad122\src;

use Exception;

class JsonFileManager implements ManagerFile {
    public function readFile(string $filename): array {
        $handle = fopen($filename, 'r');
        $jsonData = fread($handle, filesize($filename)); 
        fclose($handle); 

        $data = json_decode($jsonData, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Ошибка JSON: " . json_last_error_msg());
        }
        return $data;
    }

    public function writeFile(string $filename, array $data): void {
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);

        $handle = fopen($filename, 'w'); 
        if ($handle === false) {
            throw new Exception("Ошибка");
        }
        
        fwrite($handle, $jsonData); 
        fclose($handle); 
    }
}
