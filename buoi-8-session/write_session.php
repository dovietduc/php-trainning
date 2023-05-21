<?php
// 
// 1. tao file dinh danh ban la ai tren server
// 2. tao coookie voi ten PHPSESSID
// 3. client va server da biet nhau
session_start();

// write data
$_SESSION['name'] = 'duc';
