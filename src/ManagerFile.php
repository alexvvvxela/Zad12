<?php

namespace Alexv\Zad122;

interface ManagerFile {
    public function readFile(string $filename): array;
    public function writeFile(string $filename, array $data): void;
}