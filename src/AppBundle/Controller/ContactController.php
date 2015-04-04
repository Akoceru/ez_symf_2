<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ContactController extends Controller
{
    /**
     * Creates a new Series entity.
     *
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact, array(
            'action' => $this->generateUrl('contact'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'create'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $message = \Swift_Message::newInstance()
                ->setSubject($form->get('subject')->getData())
                ->setFrom($form->get('email')->getData())
                ->setTo('absalom78630@gmail.com')
                ->setBody(
                    $this->renderView(
                        'AppBundle:Mail:contactEmail.txt.twig',
                        array(
                            'ip' => $request->getClientIp(),
                            'name' => $form->get('name')->getData(),
                            'message' => $form->get('message')->getData(),
                            'contact' => $contact
                        )
                    )
                );

            $this->get('mailer')->send($message);

            $request->getSession()->getFlashBag()->add('success', 'Your email has been sent! Thanks!');

            return $this->redirect($this->generateUrl('contact'));
        }

        return $this->render('AppBundle:Mail:contact.html.twig', [
                'form' => $form->createView(),
                ]
        );
    }
}
