<?php

namespace ModelBundle\Repository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use ModelBundle\Entity\Movie;

/**
 * MovieRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MovieRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAllMoviesWithPagination($page = 1) {
        $qb = $this->createQueryBuilder('m')
            ->select(['m','m.id', 'm.title', 'm.duration', 'm.releaseDate',
                'l.language',
                'n.nationality',
                'c.category',
                'd.name as directorName', 'd.firstName as directorFirstName'])
            ->innerJoin('m.category', 'c')
            ->innerJoin('m.director', 'd')
            ->innerJoin('m.language', 'l')
            ->innerJoin('m.nationality', 'n')
            ->orderBy('m.title');

        $query = $qb->getQuery();

        $maxResults = 10;

        $firstResult = ($page - 1) * $maxResults;
        $query->setFirstResult($firstResult)->setMaxResults($maxResults);

        $paginator = new Paginator($query);

        if (($paginator->count() <= $firstResult) && $page != 1) {
            throw new NotFoundHttpException("La page demandée n'existe pas");
        }

        return $paginator;
    }
    public function getAllMoviesForArtistId(Movie $movie){

        $actorList = $this->getActorsIdFromMovie($movie);


        $qb = $this->createQueryBuilder('m')
            ->select('m')
            ->innerJoin('m.actors', 'a')
            ->where('m.id != :movieId')
            ->andWhere( 'a.id IN (:actorList)');

        $query = $qb->getQuery();

        $query->setParameter('actorList', $actorList, \Doctrine\DBAL\Connection::PARAM_INT_ARRAY);
        $query->setParameter('movieId', $movie->getId());

        return $query->getResult();
    }

    /**
     * @param Movie $movie
     * @return array
     */
    private function getActorsIdFromMovie(Movie $movie)
    {
        $actorsList = array_map(
            function ($item) {
                return $item->getId();
            },
            $movie->getActors()->toArray()
        );

        return $actorsList;
    }

    public function getMoviesByDirector(Movie $movie){
        $qb = $this->createQueryBuilder('m')
            ->select('m')
            ->innerJoin('m.actors','a')
            ->where('m.id != :movieId')
            ->andWhere('m.director = :movieDirector');


        $query = $qb->getQuery()
            ->setParameter('movieId', $movie->getId())
            ->setParameter('movieDirector', $movie->getDirector());

        return $query->getResult();
    }
}
