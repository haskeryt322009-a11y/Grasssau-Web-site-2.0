<?php

session_start();

unset($_SESSION['user']);

header("Location: /Grasssau-Web-site%202.0/index.php");