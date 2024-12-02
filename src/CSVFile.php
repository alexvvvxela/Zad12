<?php

namespace Alexv\Zad122;

use Alexv\Zad122\ManagerFile;
  
class CsvFileManager implements ManagerFile {
    public function readFile(string $filename) : array{
        $data = [];
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle)) !== false) {
                $data[] = $row;
            }
            fclose($handle);
        }
        return $data;
    }

    public function writeFile(string $filename, array $data) : void{
        $handle = fopen($filename, 'w');
        if ($handle === false) {
            throw new Exception("Не удалось открыть файл для записи: $filename");
        }
        foreach ($data as $row) {
            fputcsv($handle, $row);
        }
        fclose($handle);
    }
}
