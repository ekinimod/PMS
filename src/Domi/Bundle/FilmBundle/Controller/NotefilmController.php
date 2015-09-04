<?php

namespace Domi\Bundle\FilmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Domi\Bundle\FilmBundle\Entity\Notefilm;
use Domi\Bundle\FilmBundle\Form\NotefilmType;

/**
 * Notefilm controller.
 *
 */
class NotefilmController extends Controller
{

    /**
     * Lists all Notefilm entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager('film');

        $entities = $em->getRepository('DomiFilmBundle:Notefilm')->findAll();

        return $this->render('DomiFilmBundle:Notefilm:index.html.twig', array(
            'entities' => $entities,
        ));
    } 
    /**
     * Creates a new Notefilm entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Notefilm();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager('film');
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('notefilm_show', array('id' => $entity->getId())));
        }

        return $this->render('DomiFilmBundle:Notefilm:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Notefilm entity.
     *
     * @param Notefilm $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Notefilm $entity)
    {
        $form = $this->createForm(new NotefilmType(), $entity, array(
            'action' => $this->generateUrl('notefilm_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Notefilm entity.
     *
     */
    public function newAction()
    {

        $entity = new Notefilm();
        $form   = $this->createCreateForm($entity);

        return $this->render('DomiFilmBundle:Notefilm:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Notefilm entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager('film');

        $entity = $em->getRepository('DomiFilmBundle:Notefilm')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notefilm entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DomiFilmBundle:Notefilm:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Notefilm entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager('film');

        $entity = $em->getRepository('DomiFilmBundle:Notefilm')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notefilm entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DomiFilmBundle:Notefilm:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Notefilm entity.
    *
    * @param Notefilm $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Notefilm $entity)
    {
        $form = $this->createForm(new NotefilmType(), $entity, array(
            'action' => $this->generateUrl('notefilm_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Notefilm entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager('film');

        $entity = $em->getRepository('DomiFilmBundle:Notefilm')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notefilm entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('notefilm_edit', array('id' => $id)));
        }

        return $this->render('DomiFilmBundle:Notefilm:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Notefilm entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager('film');
            $entity = $em->getRepository('DomiFilmBundle:Notefilm')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Notefilm entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('notefilm'));
    }

    /**
     * Creates a form to delete a Notefilm entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('notefilm_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
