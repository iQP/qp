<?php

namespace Forms\QuestionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Forms\QuestionBundle\Entity\TextQ;
use Forms\QuestionBundle\Form\TextQType;

/**
 * TextQ controller.
 *
 * @Route("/f/textq")
 */
class TextQController extends Controller
{

    /**
     * Lists all TextQ entities.
     *
     * @Route("/", name="f_textq")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FormsQuestionBundle:TextQ')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TextQ entity.
     *
     * @Route("/", name="f_textq_create")
     * @Method("POST")
     * @Template("FormsQuestionBundle:TextQ:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TextQ();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('f_textq_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a TextQ entity.
     *
     * @param TextQ $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TextQ $entity)
    {
        $form = $this->createForm(new TextQType(), $entity, array(
            'action' => $this->generateUrl('f_textq_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TextQ entity.
     *
     * @Route("/new", name="f_textq_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TextQ();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TextQ entity.
     *
     * @Route("/{id}", name="f_textq_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsQuestionBundle:TextQ')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TextQ entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TextQ entity.
     *
     * @Route("/{id}/edit", name="f_textq_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsQuestionBundle:TextQ')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TextQ entity.');
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
    * Creates a form to edit a TextQ entity.
    *
    * @param TextQ $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TextQ $entity)
    {
        $form = $this->createForm(new TextQType(), $entity, array(
            'action' => $this->generateUrl('f_textq_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TextQ entity.
     *
     * @Route("/{id}", name="f_textq_update")
     * @Method("PUT")
     * @Template("FormsQuestionBundle:TextQ:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsQuestionBundle:TextQ')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TextQ entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('f_textq_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TextQ entity.
     *
     * @Route("/{id}", name="f_textq_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FormsQuestionBundle:TextQ')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TextQ entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('f_textq'));
    }

    /**
     * Creates a form to delete a TextQ entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('f_textq_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
