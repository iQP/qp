<?php

namespace Forms\FilterBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Forms\FilterBundle\Entity\FormDomain;
use Forms\FilterBundle\Form\FormDomainType;

/**
 * FormDomain controller.
 *
 * @Route("/f/formdomain")
 */
class FormDomainController extends Controller
{

    /**
     * Lists all FormDomain entities.
     *
     * @Route("/", name="f_formdomain")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FormsFilterBundle:FormDomain')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new FormDomain entity.
     *
     * @Route("/", name="f_formdomain_create")
     * @Method("POST")
     * @Template("FormsFilterBundle:FormDomain:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new FormDomain();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('f_formdomain_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a FormDomain entity.
     *
     * @param FormDomain $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(FormDomain $entity)
    {
        $form = $this->createForm(new FormDomainType(), $entity, array(
            'action' => $this->generateUrl('f_formdomain_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new FormDomain entity.
     *
     * @Route("/new", name="f_formdomain_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new FormDomain();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a FormDomain entity.
     *
     * @Route("/{id}", name="f_formdomain_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsFilterBundle:FormDomain')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FormDomain entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing FormDomain entity.
     *
     * @Route("/{id}/edit", name="f_formdomain_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsFilterBundle:FormDomain')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FormDomain entity.');
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
    * Creates a form to edit a FormDomain entity.
    *
    * @param FormDomain $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(FormDomain $entity)
    {
        $form = $this->createForm(new FormDomainType(), $entity, array(
            'action' => $this->generateUrl('f_formdomain_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing FormDomain entity.
     *
     * @Route("/{id}", name="f_formdomain_update")
     * @Method("PUT")
     * @Template("FormsFilterBundle:FormDomain:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsFilterBundle:FormDomain')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FormDomain entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('f_formdomain_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a FormDomain entity.
     *
     * @Route("/{id}", name="f_formdomain_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FormsFilterBundle:FormDomain')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FormDomain entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('f_formdomain'));
    }

    /**
     * Creates a form to delete a FormDomain entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('f_formdomain_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
