<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ArtistRepository extends EntityRepository
{
    public function findAll()
    {
        return $this->findBy([], ['name' => 'ASC']);
    }

    /**
     * @param int $decade
     * @return mixed
     */
    public function findByDecade($decade)
    {
        $qb = $this->createQueryBuilder('a');
        $qb->select('a')
            ->where($qb->expr()->between('a.creationYear', $decade, ($decade + 10)))
            ->orderBy('a.name');

        return $qb->getQuery()->execute();
    }

    public function findAllWithAlbums($firstLetters = null)
    {
        $qb = $this->createQueryBuilder('a');

        $qb->select('a')
            ->join('a.albums', 'album');

        if (is_string($firstLetters)) {
            $qb->where($qb->expr()->like('album.title', ':title'))
                ->setParameter(':title', $firstLetters.'%');
        }

        return $qb->getQuery()->execute();
    }
}
