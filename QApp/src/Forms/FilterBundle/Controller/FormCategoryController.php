<?php

namespace Forms\FilterBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Forms\FilterBundle\Entity\FormCategory;
use Forms\FilterBundle\Form\FormCategoryType;

/**
 * FormCategory controller.
 *
 * @Route("/f/formcategory")
 */
class FormCategoryController extends Controller
{

    /**
     * Lists all FormCategory entities.
     *
     * @Route("/", name="f_formcategory")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FormsFilterBundle:FormCategory')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new FormCategory entity.
     *
     * @Route("/", name="f_formcategory_create")
     * @Method("POST")
     * @Template("FormsFilterBundle:FormCategory:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new FormCategory();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('f_formcategory_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a FormCategory entity.
     *
     * @param FormCategory $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(FormCategory $entity)
    {
        $form = $this->createForm(new FormCategoryType(), $entity, array(
            'action' => $this->generateUrl('f_formcategory_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new FormCategory entity.
     *
     * @Route("/new", name="f_formcategory_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new FormCategory();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a FormCategory entity.
     *
     * @Route("/{id}", name="f_formcategory_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsFilterBundle:FormCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FormCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing FormCategory entity.
     *
     * @Route("/{id}/edit", name="f_formcategory_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsFilterBundle:FormCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FormCategory entity.');
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
    * Creates a form to edit a FormCategory entity.
    *
    * @param FormCategory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(FormCategory $entity)
    {
        $form = $this->createForm(new FormCategoryType(), $entity, array(
            'action' => $this->generateUrl('f_formcategory_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing FormCategory entity.
     *
     * @Route("/{id}", name="f_formcategory_update")
     * @Method("PUT")
     * @Template("FormsFilterBundle:FormCategory:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsFilterBundle:FormCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FormCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('f_formcategory_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a FormCategory entity.
     *
     * @Route("/{id}", name="f_formcategory_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FormsFilterBundle:FormCategory')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FormCategory entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('f_formcategory'));
    }

    /**
     * Creates a form to delete a FormCategory entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('f_formcategory_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
