<?php

namespace harpya\dashboard\controller;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use harpya\cms\Controller;
use harpya\dashboard\service\ToolService;

class IndexController extends Controller
{
    public function index()
    {
        $service = new ToolService();
        $tools = $service->getToolsList();
        echo $this->getTemplateManager()->render('home.twig', ['tools' => $tools]);
    }

    public function about()
    {
        echo $this->getTemplateManager()->render('about.twig', []);
    }

    public function documentation()
    {
        echo $this->getTemplateManager()->render('documentation.twig', []);
    }
}
