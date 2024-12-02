<?php
namespace Alexv\Zad122;

use Exception;

class TextFileManager implements ManagerFile {
    public function readFile(string $filename) : array {
        if (!file_exists($filename)) {
            throw new Exception("Файл не найден: $filename");
        }

        $handle = fopen($filename, 'r');
        if ($handle === false) {
            throw new Exception("Не удалось открыть файл для чтения: $filename");
        }

        $content = fread($handle, filesize($filename));
        fclose($handle);
        
        return $content;
    }

    public function writeFile(string $filename, array $data) : void {
        $handle = fopen($filename, 'w');
        if ($handle === false) {
            throw new Exception("Не удалось открыть файл для записи: $filename");
        }
        fwrite($handle, $data);
        fclose($handle);
    }
}
