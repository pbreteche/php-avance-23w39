<?php

class StreamLoggerOutputAdapter implements OutputWriterInterface
{
    public function __construct(private StreamLogger $logger)
    {
    }

    public function output(string $line): void
    {
        $this->logger->write($line);
    }
}
