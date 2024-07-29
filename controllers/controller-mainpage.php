<?php

// J'ouvre ma session

session_start();


require_once '../config.php';


// j'appelle mes helpers
require_once '../helpers/database.php';
require_once '../helpers/form.php';


// j'appelle mes models
require_once '../models/user.php';


include "../views/mainpage.php";