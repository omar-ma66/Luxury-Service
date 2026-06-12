<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class JobsController extends AbstractController
{
    #[Route('/jobs', name: 'app_jobs')]
    public function index(): Response
    {
        return $this->render('jobs/jobs.html.twig', [
            'controller_name' => 'JobsController',
        ]);
    }

  #[Route('/jobs/show',name:'app_jobs_show')]
  public function show():Response
  {

  return $this->render('jobs/show.html.twig');
  }  
}
