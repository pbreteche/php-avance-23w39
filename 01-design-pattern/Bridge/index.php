<?php

$r1 = new HttpRequest1('GET', '/article/123');

$bridge = new HttpRequestBridge();

$r2 = $bridge->request2FromRequest1($r1);
