<?php

use harpya\dashboard\controller\IndexController;

$this->map('GET', '/about', [IndexController::class, 'about']);
$this->map('GET', '/documentation', [IndexController::class, 'documentation']);
