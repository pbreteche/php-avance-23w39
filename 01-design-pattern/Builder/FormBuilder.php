<?php

class FormBuilder
{
    private Form $form;

    public function __construct()
    {
        $this->form = new Form();
    }

    public function add(string $fieldName): self
    {
        $this->form->addField(new Field($fieldName));

        return $this;
    }

    public function getForm(): Form
    {
        return $this->form;
    }
}
