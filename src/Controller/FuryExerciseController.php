<?php

namespace App\Controller;

use App\Entity\FuryExercise;
use App\Entity\FuryExerciseCategory;
use App\Form\FuryExerciseType;
use App\Repository\FuryExerciseCategoryRepository;
use App\Repository\FuryExerciseRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fury/exercise")
 */
class FuryExerciseController extends AbstractController
{
    /**
     * @var FuryExerciseCategoryRepository
     */
    private $categoryRepository;

    public function __construct(FuryExerciseCategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @Route("/", name="fury_exercise_index", methods="GET")
     * @IsGranted("ROLE_USER")
     */
    public function index(FuryExerciseRepository $furyExerciseRepository): Response
    {
        return $this->render('fury_exercise/index.html.twig', ['fury_exercises' => $furyExerciseRepository->findAllAscending()]);
    }

    /**
     * @Route("/new", name="fury_exercise_new", methods="GET|POST")
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $furyExercise = new FuryExercise();
        $errors = [];
        $errors['name'] = false;
        $errors['description'] = false;
        $errors['category'] = false;

        $categories = $this->categoryRepository->getAllCategoryNames();

        if($request->isMethod('POST')){
            $furyExercise->setName(isset($_POST['name']) ? $_POST['name'] : null);
            $furyExercise->setDescription(isset($_POST['description']) ? $this->htmlSafe($_POST['description']) : null);
            $furyCategory = isset($_POST['category']) ? $this->categoryRepository->findOneByName($_POST['category']) : null;

            if ($furyCategory) {
                $furyExercise->addCategory($furyCategory);
            } else {
                $errors['category'] = "Must select a category.";
            }

            if ($furyExercise->getName() == null) { $errors['name'] = "Name cannot be blank"; }
            if ($furyExercise->getDescription() == null ) { $errors['description'] = "Description cannot be blank."; }

            return $this->render('fury_exercise/new.html.twig', [
                'exercise' => $furyExercise,
                'categories' => $categories,
                'errors' => $errors,
            ]);

        }

        return $this->render('fury_exercise/new.html.twig', [
            'exercise' => $furyExercise,
            'categories' => $categories,
            'errors' => $errors,
        ]);
    }

    /**
     * @Route("/{id}", name="fury_exercise_show", methods="GET")
     * @IsGranted("ROLE_USER")
     */
    public function show(FuryExercise $furyExercise): Response
    {
        return $this->render('fury_exercise/show.html.twig', ['fury_exercise' => $furyExercise]);
    }

    /**
     * @Route("/{id}/edit", name="fury_exercise_edit", methods="GET|POST")
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, FuryExercise $furyExercise): Response
    {
        $form = $this->createForm(FuryExerciseType::class, $furyExercise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fury_exercise_edit', ['id' => $furyExercise->getId()]);
        }

        return $this->render('fury_exercise/edit.html.twig', [
            'fury_exercise' => $furyExercise,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fury_exercise_delete", methods="DELETE")
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, FuryExercise $furyExercise): Response
    {
        if ($this->isCsrfTokenValid('delete'.$furyExercise->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($furyExercise);
            $em->flush();
        }

        return $this->redirectToRoute('fury_exercise_index');
    }

    private function htmlSafe($value) {
        return trim(strip_tags(htmlspecialchars($value)));
    }
}
