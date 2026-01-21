<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Repository\PokemonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class ListePokemonController extends AbstractController
{

    #[IsGranted('ROLE_USER')]
    #[Route('/liste/pokemon', name: 'app_liste_pokemon')]
    public function index(PokemonRepository $pokemonRepository): Response
    {

        $pokemon = $pokemonRepository->findAll();

        return $this->render('liste_pokemon/index.html.twig', [
            'controller_name' => 'ListePokemonController',
            'pokemons' => $pokemon,
        ]);
    }

}
