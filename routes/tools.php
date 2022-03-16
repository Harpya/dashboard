<?php

use harpya\dashboard\controller\ToolController;

$this->map('GET', '/tools/[:id]', [ToolController::class, 'showDetails']);
