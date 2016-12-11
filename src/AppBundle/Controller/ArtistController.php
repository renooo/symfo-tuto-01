<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Artist;
use Doctrine\ORM\EntityRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ArtistController extends Controller
{
    private function getMagicNumbers()
    {
        $cache = $this->get('cache.app');
        $cachedMagicNumbers = $cache->getItem('magicNumbers');

        if (!$cachedMagicNumbers->isHit()) {
            sleep(5);
            $magicNumbers = [rand(1, 42), rand(1, 42), rand(1, 42)];
            $cachedMagicNumbers->set($magicNumbers);
            $cache->save($cachedMagicNumbers);
        } else {
            $magicNumbers = $cachedMagicNumbers->get();
        }

        return $magicNumbers;
    }

    /**
     * @Route(path="/artists")
     * @Route(path="/artists/{decade}0s", requirements={"decade": "[0-9]{3,3}"})
     */
    public function indexAction(Request $request, $decade = null)
    {
        /** @var EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('AppBundle:Artist');
        
        if (null === $decade) {
            $artists = $repository->findAll();
        } else {
            $decade *= 10;
            $artists = $repository->findByDecade($decade);
        }
    
        $artistPageViews = $request->getSession()->get('artistPageViews', 0);

        return $this->render('artist/index.html.twig', [
            'artists' => $artists,
            'artistPageViews' => $artistPageViews,
            'magicNumbers' => implode(',', $this->getMagicNumbers()),
            'decade' => $decade,
        ]);
    }

    /**
     * @Route(path="/artists/search")
     */
    public function searchAction()
    {
        return $this->render('artist/search.html.twig');
    }

    /**
     * @Route(path="/artist/{id}", requirements={"id": "[0-9]+"})
     */
    public function showAction(Request $request, Artist $artist)
    {
        $artistPageViews = $request->getSession()->get('artistPageViews', 0) + 1;
        $request->getSession()->set('artistPageViews', $artistPageViews);
        $this->get('logger')->info('Artist page view', ['artist' => $artist]);

        return $this->render('artist/show.html.twig', ['artist' => $artist]);
    }

    /**
     * @Route(path="/artist/new")
     */
    public function newAction()
    {
        return $this->render('artist/new.html.twig');
    }

    /**
     * @Route(path="/artist/{id}/edit")
     */
    public function editAction()
    {
        return $this->render('artist/edit.html.twig');
    }

    /**
     * @Route(path="/artist/{id}/delete")
     */
    public function deleteAction()
    {
        return $this->render('artist/delete.html.twig');
    }
}
