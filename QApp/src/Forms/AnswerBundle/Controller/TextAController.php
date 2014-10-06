<?php

namespace Forms\AnswerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Forms\AnswerBundle\Entity\TextA;
use Forms\AnswerBundle\Form\TextAType;

/**
 * TextA controller.
 *
 * @Route("/f/texta")
 */
class TextAController extends Controller
{

    /**
     * Lists all TextA entities.
     *
     * @Route("/", name="f_texta")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FormsAnswerBundle:TextA')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TextA entity.
     *
     * @Route("/", name="f_texta_create")
     * @Method("POST")
     * @Template("FormsAnswerBundle:TextA:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TextA();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('f_texta_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a TextA entity.
     *
     * @param TextA $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TextA $entity)
    {
        $form = $this->createForm(new TextAType(), $entity, array(
            'action' => $this->generateUrl('f_texta_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TextA entity.
     *
     * @Route("/new", name="f_texta_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TextA();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TextA entity.
     *
     * @Route("/{id}", name="f_texta_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsAnswerBundle:TextA')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TextA entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TextA entity.
     *
     * @Route("/{id}/edit", name="f_texta_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsAnswerBundle:TextA')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TextA entity.');
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
    * Creates a form to edit a TextA entity.
    *
    * @param TextA $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TextA $entity)
    {
        $form = $this->createForm(new TextAType(), $entity, array(
            'action' => $this->generateUrl('f_texta_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TextA entity.
     *
     * @Route("/{id}", name="f_texta_update")
     * @Method("PUT")
     * @Template("FormsAnswerBundle:TextA:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsAnswerBundle:TextA')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TextA entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('f_texta_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TextA entity.
     *
     * @Route("/{id}", name="f_texta_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FormsAnswerBundle:TextA')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TextA entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('f_texta'));
    }

    /**
     * Creates a form to delete a TextA entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('f_texta_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
