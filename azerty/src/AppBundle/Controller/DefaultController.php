<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Composer;
use AppBundle\Form\ComposerType;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $doctrine = $this->getDoctrine();
        $rc = $doctrine->getRepository('AppBundle:Categories');
        $result= $rc->findAll();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', ['result'=>$result
        ]);
    }

    /**
     * @Route("/categorie/{id}", name="categorie")
     */
    public function categorieAction(Request $request,$id)
    {

        $doctrine = $this->getDoctrine();
        $rc = $doctrine->getRepository('AppBundle:Pizza');
        $result= $rc->findByCategory($id);


        return $this->render('default/categorie.html.twig', ['result'=>$result
        ]);

    }

    /**
     * @Route("/composer", name="composer")
     */
    public function composerAction(Request $request)
    {
        $doctrine = $this->getDoctrine();




        $em = $doctrine->getManager();
        $rc = $doctrine->getRepository('AppBundle:Composer');


            $entity = new Composer();


        /*
        *persist : la requette est en fille d'attante
         * flush execute
        */








        $entityType = ComposerType::class;

        $form = $this->createForm($entityType,$entity);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $entity = $form->getData();


            /*
            *persist : la requette est en fille d'attante
             * flush execute
            */

            $em->persist($entity);
            $em->flush();

            return $this->redirectToRoute('result');

        }
        return $this->render('default/composer.html.twig',['form' => $form->createView()


        ]);



    }

    /**
     * @Route("/result/{user}", name="result")
     */
    public function pizzacAction(Request $request,$user)
    {

        $doctrine = $this->getDoctrine();

        $rc = $doctrine->getRepository('AppBundle:Composer');

        $result = $rc->findByUser($user);



        return $this->render('default/result.html.twig',['result'=>$result]);
    }
}
