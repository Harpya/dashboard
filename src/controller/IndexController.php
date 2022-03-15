<?php

namespace harpya\dashboard\controller;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use harpya\cms\Controller;

class IndexController extends Controller
{
    public function index()
    {
        echo $this->getTemplateManager()->render('home.twig', []);
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
