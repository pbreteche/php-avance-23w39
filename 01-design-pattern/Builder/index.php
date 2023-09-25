<?php

$builder = new FormBuilder();

$form = $builder
    ->add('first_name')
    ->add('last_name')
    ->getForm()
;

var_dump($form->getAll());
