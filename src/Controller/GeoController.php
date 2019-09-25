<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GeoController extends AbstractController
{
    /**
     * @Route("/", name="geo")
     */

    public function index(Request $request)
    {
        
        // Création de la requête
        $headers = array('Accept' => 'application/json');
        // Appel API pour obtenir la réponse
        $response = \Unirest\Request::get('https://geo.api.gouv.fr/departements/971/communes', $headers);
        $communes = $response->body;
       

        // Création de la requête
        $tete = array('Accept' => 'application/json');
        // Appel API pour obtenir la réponse
        $reponse = \Unirest\Request::get('https://geo.api.gouv.fr/departements?fields=departement', $tete);
        $departements = $reponse->body;
        
       return $this->render('geo/index.html.twig', [
            'communes' =>$communes,
            'departements' => $departements
       ]);

    }

}
