<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TrackController extends Controller
{
    /**
     * @Route(path="/track/{id}")
     */
    public function showAction()
    {
        return $this->render('track/show.html.twig');
    }

    /**
     * @Route(path="/track/new/{album_id}")
     */
    public function newAction()
    {
        return $this->render('track/new.html.twig');
    }

    /**
     * @Route(path="/track/{id}/edit")
     */
    public function editAction()
    {
        return $this->render('track/edit.html.twig');
    }

    /**
     * @Route(path="/track/{id}/delete")
     */
    public function deleteAction()
    {
        return $this->render('track/delete.html.twig');
    }
}
