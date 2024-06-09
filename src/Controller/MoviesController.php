<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $repository;
    public function __construct(private EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(Movie::class);
    }

    #[Route('/movies', name: 'app_movies')]
    public function getAllMovies(): Response
    {
        // findAll() - SELECT * FROM movies;
        $movies = $this->repository->findAll();

//        dd($movies);

        return $this->render('movies/index.html.twig', [
            'movies' => $movies,
        ]);
    }
    #[Route('/movies/{id}', name: 'app_movies_show')]
    #[ParamConverter('movie', class: Movie::class)]
    public function getMovieById(Movie $movie): Response
    {
        // find() - SELECT * FROM movies WHERE id = $id
        $movie = $this->repository->find($movie);

        dd($movie);
    }
}
