<?php

interface OutputWriterInterface
{
    public function output(string $line): void;
}
