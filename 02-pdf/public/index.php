<?php

use Pierre\PdfExample\PdfPrinter;

include __DIR__.'/../vendor/autoload.php';

$maker = new PdfPrinter();
$maker->printPdf();
