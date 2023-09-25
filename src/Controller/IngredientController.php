<?php

namespace App\Controller;

use App\Entity\Ingrediant;
use App\Form\IngredientType;
use App\Repository\IngrediantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IngredientController extends AbstractController
{
    #[Route('/ingredient', name: 'ingredient.index', methods: ['GET'])]
    public function index(IngrediantRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {

        // #region getData 

        // $data = $repository->findAll();
        // return $this->render('pages/ingredient/index.html.twig', ['ingredients' => $data]);

        // #endregion


        // #region getData with pagination using knpPaginatorBundle
        $ings = $paginator->paginate(
            $repository->findAll(), /* query NOT result */
            $request->query->getInt('page', 3), /*page number*/
            10 /*limit per page*/
        );
        return $this->render('pages/ingredient/index.html.twig', ['ingredients' => $ings]);
        // #endregion

    }


    #[Route('ingredient/nouveau', name: 'ingredient.new', methods: ['GET', 'POST'])]

    public function new(
        Request $r,
        EntityManagerInterface $manager

    ): Response {
        $ingredient = new Ingrediant;
        $form = $this->createForm(IngredientType::class, $ingredient);

        $form->handleRequest($r);

        if ($form->isSubmitted() && $form->isValid()) {
            $ingredient = $form->getData();
            $manager->persist($ingredient);
            $manager->flush();
            $this->addFlash('success', 'dazt bikhir o 3la khiiir ');
            return $this->redirectToRoute('ingredient.index');
        }

        return $this->render('pages/ingredient/new.html.twig', ['form' => $form->createView()]);
    }
}
