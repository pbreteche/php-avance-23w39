<?php

use Pierre\PdfExample\PdfMaker;

include __DIR__.'/../vendor/autoload.php';

$maker = new PdfMaker();
$maker->makePdf();
