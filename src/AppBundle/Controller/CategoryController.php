<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class CategoryController extends Controller
{
    /**
     * @Route("/category", name="category")
     * @Template()
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('AppBundle:Category')->findAll();




        if (!$categories) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }



        return $this->render('AppBundle:Category:index.html.twig', [
            'categories' => $categories,

        ]);
    }

    /**
     * displays all articles by categories
     *
     * @Route("category/{id}", name="category_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('AppBundle:Article')->findBy(['category' => $id,]);
        $category = $em->getRepository('AppBundle:Category')->find($id);



        if (!$articles) {
            throw $this->createNotFoundException('Unable to find Episode entity.');
        }



        return $this->render('AppBundle:Category:show.html.twig', [
            'articles' => $articles,
            'category' => $category

        ]);
    }

}
