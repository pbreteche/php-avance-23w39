<?php

class Form
{
    private array $fields = [];

    private function addField(Field $field)
    {
        $this->fields[$field->getName()] = $field;
    }

    public function getAll(): array
    {
        return $this->fields;
    }
}
