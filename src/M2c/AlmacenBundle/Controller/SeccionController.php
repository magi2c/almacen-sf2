<?php

namespace M2c\AlmacenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use M2c\AlmacenBundle\Entity\Seccion;
use M2c\AlmacenBundle\Form\SeccionType;

/**
 * Seccion controller.
 *
 */
class SeccionController extends Controller
{
    /**
     * Lists all Seccion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AlmacenBundle:Seccion')->findAll();

        return $this->render('AlmacenBundle:Seccion:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Seccion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlmacenBundle:Seccion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Seccion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AlmacenBundle:Seccion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Seccion entity.
     *
     */
    public function newAction()
    {
        $entity = new Seccion();
        $form   = $this->createForm(new SeccionType(), $entity);

        return $this->render('AlmacenBundle:Seccion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Seccion entity.
     *
     */
    public function createAction()
    {
        $entity  = new Seccion();
        $request = $this->getRequest();
        $form    = $this->createForm(new SeccionType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('almacen_seccion_show', array('id' => $entity->getId())));
        }

        return $this->render('AlmacenBundle:Seccion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Seccion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlmacenBundle:Seccion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Seccion entity.');
        }

        $editForm = $this->createForm(new SeccionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AlmacenBundle:Seccion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Seccion entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlmacenBundle:Seccion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Seccion entity.');
        }

        $editForm   = $this->createForm(new SeccionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('almacen_seccion_edit', array('id' => $id)));
        }

        return $this->render('AlmacenBundle:Seccion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Seccion entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AlmacenBundle:Seccion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Seccion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('almacen_seccion'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
