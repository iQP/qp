<?php

namespace Forms\FilterBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Forms\FilterBundle\Entity\FormTime;
use Forms\FilterBundle\Form\FormTimeType;

/**
 * FormTime controller.
 *
 * @Route("/f/formtime")
 */
class FormTimeController extends Controller
{

    /**
     * Lists all FormTime entities.
     *
     * @Route("/", name="f_formtime")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FormsFilterBundle:FormTime')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new FormTime entity.
     *
     * @Route("/", name="f_formtime_create")
     * @Method("POST")
     * @Template("FormsFilterBundle:FormTime:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new FormTime();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('f_formtime_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a FormTime entity.
     *
     * @param FormTime $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(FormTime $entity)
    {
        $form = $this->createForm(new FormTimeType(), $entity, array(
            'action' => $this->generateUrl('f_formtime_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new FormTime entity.
     *
     * @Route("/new", name="f_formtime_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new FormTime();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a FormTime entity.
     *
     * @Route("/{id}", name="f_formtime_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsFilterBundle:FormTime')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FormTime entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing FormTime entity.
     *
     * @Route("/{id}/edit", name="f_formtime_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsFilterBundle:FormTime')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FormTime entity.');
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
    * Creates a form to edit a FormTime entity.
    *
    * @param FormTime $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(FormTime $entity)
    {
        $form = $this->createForm(new FormTimeType(), $entity, array(
            'action' => $this->generateUrl('f_formtime_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing FormTime entity.
     *
     * @Route("/{id}", name="f_formtime_update")
     * @Method("PUT")
     * @Template("FormsFilterBundle:FormTime:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsFilterBundle:FormTime')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FormTime entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('f_formtime_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a FormTime entity.
     *
     * @Route("/{id}", name="f_formtime_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FormsFilterBundle:FormTime')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FormTime entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('f_formtime'));
    }

    /**
     * Creates a form to delete a FormTime entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('f_formtime_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
