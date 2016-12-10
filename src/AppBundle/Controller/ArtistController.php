<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArtistController extends Controller
{
    /**
     * @Route(path="/artists")
     */
    public function indexAction()
    {
        return $this->render('artist/index.html.twig');
    }

    /**
     * @Route(path="/artists/search")
     */
    public function searchAction()
    {
        return $this->render('artist/search.html.twig');
    }

    /**
     * @Route(path="/artist/{id}")
     */
    public function showAction()
    {
        return $this->render('artist/show.html.twig');
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
