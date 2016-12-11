<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Artist
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $creationYear;

    /**
     * @var ArrayCollection
     */
    private $albums;

    function __construct()
    {
        $this->albums = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Artist
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreationYear()
    {
        return $this->creationYear;
    }

    /**
     * @param mixed $creationYear
     * @return Artist
     */
    public function setCreationYear($creationYear)
    {
        $this->creationYear = $creationYear;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getAlbums()
    {
        return $this->albums;
    }

    /**
     * @param ArrayCollection $albums
     * @return Artist
     */
    public function setAlbums($albums)
    {
        $this->albums = $albums;

        return $this;
    }
}
