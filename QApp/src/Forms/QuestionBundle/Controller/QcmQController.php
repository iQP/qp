<?php

namespace Forms\QuestionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Forms\QuestionBundle\Entity\QcmQ;
use Forms\QuestionBundle\Form\QcmQType;

/**
 * QcmQ controller.
 *
 * @Route("/f/qcmq")
 */
class QcmQController extends Controller
{

    /**
     * Lists all QcmQ entities.
     *
     * @Route("/", name="f_qcmq")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FormsQuestionBundle:QcmQ')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new QcmQ entity.
     *
     * @Route("/", name="f_qcmq_create")
     * @Method("POST")
     * @Template("FormsQuestionBundle:QcmQ:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new QcmQ();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('f_qcmq_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a QcmQ entity.
     *
     * @param QcmQ $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(QcmQ $entity)
    {
        $form = $this->createForm(new QcmQType(), $entity, array(
            'action' => $this->generateUrl('f_qcmq_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new QcmQ entity.
     *
     * @Route("/new", name="f_qcmq_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new QcmQ();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a QcmQ entity.
     *
     * @Route("/{id}", name="f_qcmq_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsQuestionBundle:QcmQ')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QcmQ entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing QcmQ entity.
     *
     * @Route("/{id}/edit", name="f_qcmq_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsQuestionBundle:QcmQ')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QcmQ entity.');
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
    * Creates a form to edit a QcmQ entity.
    *
    * @param QcmQ $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(QcmQ $entity)
    {
        $form = $this->createForm(new QcmQType(), $entity, array(
            'action' => $this->generateUrl('f_qcmq_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing QcmQ entity.
     *
     * @Route("/{id}", name="f_qcmq_update")
     * @Method("PUT")
     * @Template("FormsQuestionBundle:QcmQ:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FormsQuestionBundle:QcmQ')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QcmQ entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('f_qcmq_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a QcmQ entity.
     *
     * @Route("/{id}", name="f_qcmq_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FormsQuestionBundle:QcmQ')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find QcmQ entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('f_qcmq'));
    }

    /**
     * Creates a form to delete a QcmQ entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('f_qcmq_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
