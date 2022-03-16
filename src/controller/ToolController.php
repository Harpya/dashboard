<?php

namespace harpya\dashboard\controller;

use harpya\cms\Controller;
use harpya\dashboard\service\ToolService;

class ToolController extends Controller
{
    public function showDetails($id)
    {
        $service = new ToolService();
        $tools = $service->getToolsList();

        $data = [
            'tools' => $tools,
            'id'=>$id,
            'tool' => $tools[$id],
            'contents' => $this->getDocToolsContents($id),
        ];

        echo $this->getTemplateManager()->render('tools-details.twig', $data);
    }



    protected function getDocToolsContents($id)
    {
        $contents = '';
        $pathName = DOC_TOOLS_DIR . "/$id";
        if (file_exists($pathName) && is_dir($pathName)) {
            $filename = "$pathName/index.html";

            if (file_exists($filename) && is_readable($filename)) {
                $contents = file_get_contents($filename);
            }
        }
        return $contents;
    }
}
