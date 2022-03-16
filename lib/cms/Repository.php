<?php

namespace harpya\cms;

class Repository
{
    protected $data = null;

    protected function getData()
    {
        if (is_null($this->data)) {
            $this->loadDataFile();
        }
        return $this->data;
    }

    protected function loadDataFile()
    {
        $pathName = DATA_DIR;
        if (!file_exists($pathName)) {
            throw new \Exception("Folder $pathName does not exists");
        }
        $fileName = "$pathName/".static::$DATA_FILE_NAME;
        if (!file_exists($fileName)) {
            throw new \Exception("Data file $fileName does not exists");
        }

        $contents = file_get_contents($fileName);

        $arr = json_decode($contents, true);
        if (!is_array($arr)) {
            throw new \Exception("Invalid data on file $fileName");
        }
        $this->data = $arr;
    }
}
