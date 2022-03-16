<?php

namespace harpya\dashboard\service;

use harpya\dashboard\repository\ToolRepository;

class ToolService
{
    public function getToolsList()
    {
        $repository = new ToolRepository();
        return $repository->list();
    }
}
