<?php

namespace harpya\cms;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Controller
{
    protected $templateManager;

    public function getTemplateManager()
    {
        if (!$this->templateManager) {
            $loader = new FilesystemLoader(TEMPLATE_DIR);
            $this->templateManager  = new Environment($loader);
        }
        return $this->templateManager;
    }
}
