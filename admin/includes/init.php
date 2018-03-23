<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('DS')? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT','D:'. DS .'wamp64'. DS .'www'. DS .'gallery' );
defined('INCLUDES_PATH')? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');

require 'functions.php';
require 'config.php';
require 'database.php';
require 'db_object.php';
require 'user.php';
require 'photo.php';
require 'session.php';