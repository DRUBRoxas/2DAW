<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PrincipalController extends AbstractController
{
    /**
     * @Route("/", name="principal")
     */
    public function index()
    {
        $plantas = ["Adelfa", "Tomillo", "Arandano"];
        return $this->render('principal/index.html.twig', ["plantas" => $plantas]);
    }

    /**
     * @Route("/saludo", name="saludo")
     *
     * @return void
     */
    public function saludo()
    {
        return $this->render('principal/saludo.html.twig');
    }

    public function crear_menu_izquierdo()
    {
        $colores = ["Rojo", "Blanco", "Amarillo"];
        return $this->render("shared/menu_izquierdo.html.twig", ["colores" => $colores]);
    }
}
