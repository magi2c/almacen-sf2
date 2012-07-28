<?php

namespace M2c\AlmacenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use M2c\AlmacenBundle\Entity\Caja;
use M2c\AlmacenBundle\Form\CajaType;

/**
 * Caja controller.
 *
 */
class CajaController extends Controller
{
    /**
     * Lists all Caja entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AlmacenBundle:Caja')->findAll();

        return $this->render('AlmacenBundle:Caja:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Caja entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlmacenBundle:Caja')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caja entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AlmacenBundle:Caja:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Caja entity.
     *
     */
    public function newAction()
    {
        $entity = new Caja();
        $form   = $this->createForm(new CajaType(), $entity);

        return $this->render('AlmacenBundle:Caja:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Caja entity.
     *
     */
    public function createAction()
    {
        $entity  = new Caja();
        $request = $this->getRequest();
        $form    = $this->createForm(new CajaType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('almacen_caja_show', array('id' => $entity->getId())));
        }

        return $this->render('AlmacenBundle:Caja:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Caja entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlmacenBundle:Caja')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caja entity.');
        }

        $editForm = $this->createForm(new CajaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AlmacenBundle:Caja:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Caja entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlmacenBundle:Caja')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caja entity.');
        }

        $editForm   = $this->createForm(new CajaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('almacen_caja_edit', array('id' => $id)));
        }

        return $this->render('AlmacenBundle:Caja:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Caja entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AlmacenBundle:Caja')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Caja entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('almacen_caja'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
