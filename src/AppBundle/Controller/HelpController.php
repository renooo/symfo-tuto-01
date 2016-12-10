<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelpController extends Controller
{
    public function indexAction()
    {
        return new Response('Chuck Norris arrive !');
    }
    
    public function heroAction($hero)
    {
        return new Response(sprintf('%s est en chemin !', $hero));
    }

    /**
     * @Route(path="/aide-telephonique")
     *
     * @return Response
     */
    public function callAction()
    {
        return new Response('Ghostbusters : <strong>0800 2229 911</strong>');
    }

    /**
     * @Route(path="/debug-request")
     *
     * @param Request $request
     * @return Response
     */
    public function debugRequestAction(Request $request)
    {
        dump($request);
        dump($request->getLocale());
        dump($request->getMethod());
        dump($request->query->get('prenom', 'toto'));

        $response = new Response();

        $response->setStatusCode(Response::HTTP_OK)
                 ->setContent('Hello World !');

        return $response;
    }

    /**
     * @Route(path="/json-response")
     */
    public function jsonResponseAction()
    {
        $data = [
            'foo' => 123,
            'bar' => 'azerty',
            'baz' => ['toto' => 'tutu'],
            'fum' => false,
        ];

        return new JsonResponse($data);
    }
}
