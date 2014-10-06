<?php

namespace Back\BackBundle\Controller;

use Forms\FormBundle\Controller\FormController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Forms\FormBundle\Entity\Form;
use Forms\FormBundle\Form\FormType;

class TestController extends FormController
{
    /**
     * Creates a new Form entity.
     *
     * @Route("/", name="f_form_create")
     * @Method("POST")
     * @Template("FormsFormBundle:Form:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Form();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('f_form_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Form entity.
     *
     * @param Form $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Form $entity)
    {
        $form = $this->createForm(new FormType(), $entity, array(
            'action' => $this->generateUrl('f_form_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer le questionnaire'));
        return $form;
    }

    /**
     * Displays a form to create a new Form entity.
     *
     * @Route("/new", name="f_form_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Form();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
}
