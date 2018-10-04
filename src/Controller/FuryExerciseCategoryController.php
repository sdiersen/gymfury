<?php

namespace App\Controller;

use App\Entity\FuryExerciseCategory;
use App\Form\FuryExerciseCategoryType;
use App\Repository\FuryExerciseCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fury/exercise/category")
 */
class FuryExerciseCategoryController extends AbstractController
{
    /**
     * @Route("/", name="fury_exercise_category_index", methods="GET")
     */
    public function index(FuryExerciseCategoryRepository $furyExerciseCategoryRepository): Response
    {
        return $this->render('fury_exercise_category/index.html.twig', ['fury_exercise_categories' => $furyExerciseCategoryRepository->findAll()]);
    }

    /**
     * @Route("/new", name="fury_exercise_category_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $furyExerciseCategory = new FuryExerciseCategory();
        $form = $this->createForm(FuryExerciseCategoryType::class, $furyExerciseCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($furyExerciseCategory);
            $em->flush();

            return $this->redirectToRoute('fury_exercise_category_index');
        }

        return $this->render('fury_exercise_category/new.html.twig', [
            'fury_exercise_category' => $furyExerciseCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fury_exercise_category_show", methods="GET")
     */
    public function show(FuryExerciseCategory $furyExerciseCategory): Response
    {
        return $this->render('fury_exercise_category/show.html.twig', ['fury_exercise_category' => $furyExerciseCategory]);
    }

    /**
     * @Route("/{id}/edit", name="fury_exercise_category_edit", methods="GET|POST")
     */
    public function edit(Request $request, FuryExerciseCategory $furyExerciseCategory): Response
    {
        $form = $this->createForm(FuryExerciseCategoryType::class, $furyExerciseCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fury_exercise_category_edit', ['id' => $furyExerciseCategory->getId()]);
        }

        return $this->render('fury_exercise_category/edit.html.twig', [
            'fury_exercise_category' => $furyExerciseCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fury_exercise_category_delete", methods="DELETE")
     */
    public function delete(Request $request, FuryExerciseCategory $furyExerciseCategory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$furyExerciseCategory->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($furyExerciseCategory);
            $em->flush();
        }

        return $this->redirectToRoute('fury_exercise_category_index');
    }
}
