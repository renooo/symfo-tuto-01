<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Album;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlbumController extends Controller
{
    /**
     * @Route(path="/album/{id}", requirements={"id": "[0-9]+"})
     */
    public function showAction(Album $album)
    {
        return $this->render('album/show.html.twig', ['album' => $album]);
    }

    /**
     * @Route(path="/album/new")
     */
    public function newAction()
    {
        return $this->render('album/new.html.twig');
    }

    /**
     * @Route(path="/album/{id}/edit")
     */
    public function editAction()
    {
        return $this->render('album/edit.html.twig');
    }

    /**
     * @Route(path="/album/{id}/delete")
     */
    public function deleteAction()
    {
        return $this->render('album/delete.html.twig');
    }
}
