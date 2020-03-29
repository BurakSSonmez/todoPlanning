<?php
namespace App\Controller;

use App\Entity\Planning;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class todoPlanningController extends AbstractController {
    /**
     * @Route("/", name="planning_list")
     * @Method({"GET"})
     */
    public function index(){

        $planning = $this->getDoctrine()->getRepository(Planning::class)->findAll();

        return $this->render('planning/index.html.twig', array('planning' => $planning));
    }

    /**
     * @Route("todoPlanning/public/planning/edit/{id}", name="edit_planning")
     * Method({"GET", "POST"})
     */
    public function edit(Request $request, $id){
        $planning = new Planning();
        $planning = $this->getDoctrine()->getRepository(Planning::class)->find($id);

        $form = $this->createFormBuilder($planning)
            ->add('developer', TextType::class, array('attr' =>array('class'=>'form-control')))
            ->add('sure', TextType::class, array('required' => false, 'attr'=> array('class' => 'form-control')))
            ->add('zor', TextType::class, array('required' => false, 'attr'=> array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' =>'Güncelle', 'attr' => array('class'=>'btn btn-primary mt-3')))
            ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('planning_list');
        }

        return $this->render('planning/edit.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("todoPlanning/public/planning/{id}", name="planning_show")
     */
    public function show($id){
        $planning = $this->getDoctrine()->getRepository(Planning::class)->find($id);

        return $this->render('planning/show.html.twig', array('planning' => $planning));
    }

    /**
     * @Route("todoPlanning/public/planning/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id) {
        $planning = $this->getDoctrine()->getRepository(Planning::class)->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($planning);
        $entityManager->flush();

        $response = new Response();
        $response->send();
    }

    /**
     * @Route("planning/providerOne.html.twig", name="pOne")
     */
    public function providerOne(Request $request){
        return $this->render('planning/providerOne.html.twig');
    }

    /**
     * @Route("planning/providerTwo.html.twig", name="pTwo")
     */
    public function providerTwo(Request $request){
        return $this->render('planning/providerTwo.html.twig');
    }
}
