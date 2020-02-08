<?php

session_start();

echo $_SESSION["i"];

$_SESSION["i"] = 1;
