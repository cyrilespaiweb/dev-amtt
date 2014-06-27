<?php
namespace Amtt\AppBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sonata\AdminBundle\Exception\ModelManagerException;
use Symfony\Component\HttpFoundation\Request;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Sonata\AdminBundle\Admin\BaseFieldDescription;
use Amtt\AppBundle\Entity\Repository;

class BlockCRUDController  extends CRUDController {

    public function editAction($id = null)
    {
        // the key used to lookup the template
        $templateKey = 'edit';
        $title = "Modifier le bloc de contenu";
        $result = array('success'=>false,'datas'=>array(),'message'=>null);

        $id = $this->get('request')->get($this->admin->getIdParameter());
        $object = $this->admin->getObject($id);

        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $id));
        }

        if (false === $this->admin->isGranted('EDIT', $object)) {
            throw new AccessDeniedException();
        }

        $this->admin->setSubject($object);

        /** @var $form \Symfony\Component\Form\Form */
        $form = $this->admin->getForm();
        $form->setData($object);

        if ($this->getRestMethod() == 'POST') {
            $form->submit($this->get('request'));

            $isFormValid = $form->isValid();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {
                $this->admin->update($object);

                return $this->renderJson(array(
                    'success'    => true,
                    'message'  => $this->admin->trans('flash_edit_success', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle')
                ));

                $result['success'] = true;
                $result['message'] = $this->admin->trans('flash_edit_success', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle');
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                $result['message'] = $this->admin->trans('sonata_flash_error', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle');
            }
        }

        $view = $form->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        $html = $this->render($this->admin->getTemplate($templateKey), array(
            'action' => 'edit',
            'form'   => $view,
            'object' => $object,
        ))->getContent();

        $result['datas']['html'] = $html;
        $result['datas']['object'] = $object;
        $result['datas']['title'] = $title;

        return $this->renderJson($result);
    }

    public function createAction()
    {
        // the key used to lookup the template
        $templateKey = 'edit';
        $title = "Ajouter un bloc de contenu";
        $result = array('success'=>false,'datas'=>array(),'message'=>null);


        if (false === $this->admin->isGranted('CREATE')) {
            throw new AccessDeniedException();
        }

        $object = $this->admin->getNewInstance();

        $this->admin->setSubject($object);

        /** @var $form \Symfony\Component\Form\Form */
        $form = $this->admin->getForm();
        $form->setData($object);

        if ($this->getRestMethod()== 'POST') {
            $form->submit($this->get('request'));

            $isFormValid = $form->isValid();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {

                if (false === $this->admin->isGranted('CREATE', $object)) {
                    throw new AccessDeniedException();
                }

                return $this->renderJson(array(
                    'success'    => true,
                    'message'  => $this->admin->trans('flash_create_success', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle')
                ));
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                $result['message'] = $this->admin->trans('flash_create_error', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle');
            }
        }

        $view = $form->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        $html = $this->render($this->admin->getTemplate($templateKey), array(
            'action' => 'edit',
            'form'   => $view,
            'object' => $object,
        ))->getContent();

        $result['datas']['html'] = $html;
        $result['datas']['object'] = $object;
        $result['datas']['title'] = $title;

        return $this->renderJson($result);
    }

} 