<?php

class FormBuilder extends Form
{
    // Une ou plusieurs méthodes pour construire progressivement 
    public function add(string $fieldName): self
    {
        $this->addField(new Field($fieldName));

        return $this;
    }

    // méthode pour obtenir le résultat
    public function getForm(): Form
    {
        return $this;
    }
}
