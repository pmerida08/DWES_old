<?php

require_once '../config/database.php';

require_once '../autoload.php';

require_once '../routes/web.php';

use App\Controllers\HomeController;

$home = new HomeController;

echo $home->index();
