<?php

namespace Forms\FilterBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Forms\FilterBundle\Entity\QuestionDomain;
use Forms\FilterBundle\Form\QuestionDomainType;

/**
 * QuestionDomain controller.
 *
 * @Route("/f/questiondomain")
 */
class QuestionDomainController extends Controller
{

    /**
     * Lists all QuestionDomain entities.
     *
     * @Route("/", name="f_questiondomain")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FormsFilterBundle:QuestionDomain')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new QuestionDomain entity.
     *
     * @Route("/", name="f_questiondomain_create")
     * @Method("POST")
     * @Template("FormsFilterBundle:QuestionDomain:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new QuestionDomain();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('f_questiondomain_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a QuestionDomain entity.
     *
     * @param QuestionDomain $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(QuestionDomain $entity)
    {
        $form = $this->createForm(new QuestionDomainType(), $entity, array(
            'action' => $this->generateUrl('f_questiondomain_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new QuestionDomain entity.
     *
     * @Route("/new", name="f_questiondomain_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new QuestionDomain();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a QuestionDomain entity.
     *
     * @Route("/{id}", name="f_questiondomain_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsFilterBundle:QuestionDomain')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuestionDomain entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing QuestionDomain entity.
     *
     * @Route("/{id}/edit", name="f_questiondomain_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsFilterBundle:QuestionDomain')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuestionDomain entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a QuestionDomain entity.
    *
    * @param QuestionDomain $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(QuestionDomain $entity)
    {
        $form = $this->createForm(new QuestionDomainType(), $entity, array(
            'action' => $this->generateUrl('f_questiondomain_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing QuestionDomain entity.
     *
     * @Route("/{id}", name="f_questiondomain_update")
     * @Method("PUT")
     * @Template("FormsFilterBundle:QuestionDomain:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsFilterBundle:QuestionDomain')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuestionDomain entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('f_questiondomain_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a QuestionDomain entity.
     *
     * @Route("/{id}", name="f_questiondomain_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FormsFilterBundle:QuestionDomain')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find QuestionDomain entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('f_questiondomain'));
    }

    /**
     * Creates a form to delete a QuestionDomain entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('f_questiondomain_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
