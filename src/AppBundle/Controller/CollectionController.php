<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CollectionController extends Controller
{
    /**
     * @Route(path="/collections")
     */
    public function indexAction()
    {
        return $this->render('collection/index.html.twig');
    }
    
    /**
     * @Route(path="/collection")
     * @Route(path="/collection/{user_id}")
     */
    public function showAction()
    {
        return $this->render('collection/show.html.twig');
    }

    /**
     * @Route(path="/collection/add/{album_id}")
     */
    public function addAlbumAction()
    {
        return $this->render('collection/add-album.html.twig');
    }

    /**
     * @Route(path="/collection/remove/{album_id}")
     */
    public function removeAlbumAction()
    {
        return $this->render('collection/remove-album.html.twig');
    }
}
