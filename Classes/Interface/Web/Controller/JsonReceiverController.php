<?php
declare(strict_types=1);
namespace Xsigns\XsignsExt\Interface\Web\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Xsigns\XsignsExt\Application\JsonImport\ImportJsonDataCommand;
use Xsigns\XsignsExt\Application\JsonImport\ImportJsonDataCommandHandler;

class JsonReceiverController extends ActionController
{
    protected ImportJsonDataCommandHandler $handler;

    public function injectHandler(ImportJsonDataCommandHandler $handler): void
    {
        $this->handler = $handler;
    }

    public function importAction(): ResponseInterface
    {
        $jsonData = json_decode($this->request->getBody()->getContents(), true);
        if (!isset($jsonData['MyData'])) {
            return $this->jsonResponse('{message: "Daten nicht gefunden!"}');
        }

        var_dump($jsonData['MyData']['payload']);

        $command = new ImportJsonDataCommand(
            $jsonData['MyData']['title'],
            json_encode($jsonData['MyData']['payload']),
        );

        try {
            $this->handler->handle($command);
            return $this->jsonResponse('{message: "Daten erfolgreich importiert!"}');
        }catch (\Exception $exception){
            return $this->jsonResponse("{message: '{$exception->getMessage()}'}");
        }

    }

    public function listAction(): ResponseInterface
    {
        $jsonData = $this->handler->findAll();
        if(!empty($jsonData)) {
            $this->view->assign('jsonData', $jsonData);
        }
        return $this->htmlResponse();
    }
}