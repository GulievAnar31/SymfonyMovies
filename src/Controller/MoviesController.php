<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/movies', name: 'app_movies')]
    public function getAllMovies(): Response
    {
        // findAll() - SELECT * FROM movies;
        $repository = $this->em->getRepository(Movie::class);

        $movies = $repository->findAll();

        dd($movies);

        return $this->render('movies/index.html.twig');
    }
    #[Route('/movies/{id}', name: 'app_movies_show')]
    public function getMovieById($id): Response
    {
        // find() - SELECT * FROM movies WHERE id = $id
        $repository = $this->em->getRepository(Movie::class);
        $movie = $repository->find($id);

        dd($movie);
    }
    #[Route('/moviesDesc', name: 'app_movies_desc')]
    public function getMoviesDesc(): Response
    {
        // Like a order by
        $repository = $this->em->getRepository(Movie::class);
        $movies = $repository->findBy([], ['id' => 'DESC']);

        dd($movies);

        return $this->render('movies/index.html.twig', [
            'movies' => $movies,
        ]);
    }

    #[Route('/moviesCount', name: 'app_movies_count')]
    public function getMoviesCount(): Response
    {
        // Like a order by
        $repository = $this->em->getRepository(Movie::class);
        $movies = $repository->count(['id' => 5]);

        dd($movies);

        return $this->render('movies/index.html.twig', [
            'movies' => $movies,
        ]);
    }
}
