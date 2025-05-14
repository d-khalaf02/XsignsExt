<?php
namespace Xsigns\XsignsExt\Interface\Web\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Xsigns\XsignsExt\Application\Amenities\AmenitiesService;
use Xsigns\XsignsExt\Domain\Model\Amenity;

class AmenityController extends ActionController
{
    private AmenitiesService $service;

    public function injectService(AmenitiesService $service): void
    {
        $this->service = $service;
    }

    public function insertAction(): ResponseInterface
    {
        $entry = json_decode($this->request->getBody()->getContents(), true);

        $amenity = new Amenity();
        $amenity->setName($entry['name']);
        $amenity->setIcon($entry['icon']);
        $amenity->setId($entry['id']);


        $this->service->setValidator(
            $this->validatorResolver
            ->getBaseValidatorConjunction(Amenity::class, 'Default')
        );

        $response = $this->service->handle($amenity);

        if(isset($response['success'])) {
            $stream = $this->streamFactory->createStream(json_encode($response));
            return $this->responseFactory
                ->createResponse()
                ->withStatus(201)
                ->withHeader('Content-Type', 'application/json')
            ->withBody($stream);
        }

        return $this->jsonResponse(json_encode($response))->withStatus(400);
    }

    public function renderAction(): ResponseInterface
    {
        $amenities = $this->service->getAmenities();
        $this->view->assign('amenities', $amenities);

        return $this->htmlResponse();
    }
}
