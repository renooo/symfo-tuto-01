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
        $artists = [
            [
                'id' => 123,
                'name' => 'Pink Floyd',
                'creation_year' => 1965,
            ],
            [
                'id' => 456,
                'name' => 'Led Zeppelin',
                'creation_year' => 1968,
            ],
            [
                'id' => 789,
                'name' => 'Black Sabbath',
                'creation_year' => 1968,
            ],
            [
                'id' => 1111,
                'name' => 'Magma',
            ]
        ];

        return $this->render('artist/index.html.twig', ['artists' => $artists]);
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
        $artist = [
            'id' => 123,
            'name' => 'pink floyd',
            'creation_year' => 1965,
        ];

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
