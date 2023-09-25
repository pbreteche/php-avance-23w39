<?php

class Form
{
    private array $fields = [];

    public function addField(Field $field)
    {
        $this->fields[$field->getName()] = $field;
    }
}
