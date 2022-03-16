<?php

namespace harpya\dashboard\repository;

use harpya\cms\Repository;

class ToolRepository extends Repository
{
    public static $DATA_FILE_NAME = 'tools.json';

    public function list()
    {
        return $this->getData();
    }
}
