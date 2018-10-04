<?php
/**
 * Created by PhpStorm.
 * User: cippio
 * Date: 9/25/18
 * Time: 4:04 PM
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="gymfury_homepage")
     */

    public function homepage() {
        return $this->render('home/homepage.html.twig', [

        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/admin", name="gymfury_admin")
     */
    public function admin() {
        return $this->render('admin/index.html.twig', [

        ]);
    }
}