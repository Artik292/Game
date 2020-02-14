<?php

session_start();

var_dump($_SESSION["i"]);

$_SESSION["i"] = 1;
