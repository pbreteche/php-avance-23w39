<?php

class FileReader implements InputReader {

    public function __construct(private string $path)
    {
        if (0 === strpos($path, '/etc')) {

        }


        if (str_starts_with($path, '/etc')) {
            
        }

    }


    public function read(): string
    {
        return file_get_contents($this->path);
    }
}
