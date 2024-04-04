<?php

$classes = [
    'AlkimaBootstrapWalker',
];

foreach ($classes as $class) {
    require_once __DIR__ . '/' . $class . '.php';
}