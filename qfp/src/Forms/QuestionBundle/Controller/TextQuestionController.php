<?php

namespace Forms\QuestionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Forms\QuestionBundle\Entity\TextQuestion;
use Forms\QuestionBundle\Form\TextQuestionType;

/**
 * TextQuestion controller.
 *
 * @Route("/f/textquestion")
 */
class TextQuestionController extends Controller
{

    /**
     * Lists all TextQuestion entities.
     *
     * @Route("/", name="f_textquestion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FormsQuestionBundle:TextQuestion')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TextQuestion entity.
     *
     * @Route("/", name="f_textquestion_create")
     * @Method("POST")
     * @Template("FormsQuestionBundle:TextQuestion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TextQuestion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('f_textquestion_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a TextQuestion entity.
     *
     * @param TextQuestion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TextQuestion $entity)
    {
        $form = $this->createForm(new TextQuestionType(), $entity, array(
            'action' => $this->generateUrl('f_textquestion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TextQuestion entity.
     *
     * @Route("/new", name="f_textquestion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TextQuestion();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TextQuestion entity.
     *
     * @Route("/{id}", name="f_textquestion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsQuestionBundle:TextQuestion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TextQuestion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TextQuestion entity.
     *
     * @Route("/{id}/edit", name="f_textquestion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsQuestionBundle:TextQuestion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TextQuestion entity.');
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
    * Creates a form to edit a TextQuestion entity.
    *
    * @param TextQuestion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TextQuestion $entity)
    {
        $form = $this->createForm(new TextQuestionType(), $entity, array(
            'action' => $this->generateUrl('f_textquestion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TextQuestion entity.
     *
     * @Route("/{id}", name="f_textquestion_update")
     * @Method("PUT")
     * @Template("FormsQuestionBundle:TextQuestion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsQuestionBundle:TextQuestion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TextQuestion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('f_textquestion_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TextQuestion entity.
     *
     * @Route("/{id}", name="f_textquestion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FormsQuestionBundle:TextQuestion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TextQuestion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('f_textquestion'));
    }

    /**
     * Creates a form to delete a TextQuestion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('f_textquestion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
