<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 27/03/2015
 * Time: 11:00
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ApiController
 *
 * @package AppBundle\Controller
 *
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/article/{id}", name="api_article", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function articleAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /**
         * @var ArticleRepository('AppBundle:Article')
         */
        $repo = $em->getRepository('AppBundle:Article');
        $articles = $repo->findApi($id);


        return new JsonResponse($articles);

    }

    /**
     * @Route("/category/{id}", name="api_category", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function categoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /**
         * @var CategoryRepository('AppBundle:Category')
         */
        $repo = $em->getRepository('AppBundle:Category');
        $categories = $repo->findApi($id);


        return new JsonResponse($categories);
    }

    /**
     * @Route("/tag/{id}", name="api_tag", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function tagAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /**
         * @var CategoryRepository('AppBundle:Tag')
         */
        $repo = $em->getRepository('AppBundle:Tag');
        $tags = $repo->findApi($id);


        return new JsonResponse($tags);
    }

    /**
     * @Route("/user/{id}", name="api_user", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function userAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /**
         * @var UserRepository('AppBundle:User')
         */
        $repo = $em->getRepository('AppBundle:User');
        $users = $repo->findApi($id);


        return new JsonResponse($users);
    }

}