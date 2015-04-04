<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TagController extends Controller
{
    /**
     * @Route("/tag/show", name="tag")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tags = $em->getRepository('AppBundle:Tag')->findAll();




        if (!$tags) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }



        return $this->render('AppBundle:Tag:index.html.twig', [
            'tags' => $tags,

        ]);
         }

    /**
     * @Route("/tag/create")
     * @Template()
     */
    public function createAction()
    {

           }

}
