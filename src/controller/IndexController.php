<?php

namespace harpya\dashboard\controller;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use harpya\cms\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $tools = [
            [
                'image' => [
                    'url' => 'https://dummyimage.com/350x250/c7c7c7/000.png',
                    'alt' => ''
                ],
                'title' => 'API Mocking Server',
                'description' => 'Tool created to mock real API servers in integration tests',
                'url' => '#'
            ]

        ];

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
