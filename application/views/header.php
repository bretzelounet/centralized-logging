<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js" lang="fr">
<head>
		<meta charset="UTF-8">
		<title>Centralized logging</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/materialize.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<nav role="navigation">
    <div class="nav-wrapper container">
        <a href="#" class="brand-logo right"><i style="float:left;" class="material-icons">subject</i>CENTRALIZED <span style="color:#e67e22;">LOGGING</span></a>
        <ul id="nav-links">
            <li><a id="settings_link" href="<?php echo base_url("settings"); ?>"><i class="material-icons">settings</i></a></li>
            <li><a id="yarn_link" href="<?php echo base_url("yarn"); ?>">YARN</a></li>
            <li><a id="impala_link" href="#">IMPALA</a></li>
            <li><a id="oozie_link" href="#">OOZIE</a></li>
        </ul>
    </div>
</nav>