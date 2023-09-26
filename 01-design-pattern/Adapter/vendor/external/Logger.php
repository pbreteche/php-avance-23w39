<?php

class Logger
{
    public function __construct(private OuputWriterInterface $output)
    {
    }

    public function log(string $criticity, string $message)
    {
        $this->output->output($criticity.' : '.$message);
    }
}
