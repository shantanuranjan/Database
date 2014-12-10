<?php
session_name("project");
session_start();
session_destroy();
echo 1;
?>