<?php 
session_start();
session_destroy();

header("location:../dashboard_awal.php?alert=dashboard_awal");
exit();?>