<?php
session_start();
session_reset();
session_destroy();
echo "Variable Destroyed";
?>