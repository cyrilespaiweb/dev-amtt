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
use Amtt\AppBundle\Admin\BlockAdmin;

class PageCRUDController  extends CRUDController {

    public function editBlockAction($id)
    {
        $templateKey = 'edit';
        $blockId = $this->get('request')->get('blockId');

        $object = $this->getDoctrine()
            ->getRepository('AmttAppBundle:Block')
            ->find($blockId);

        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $blockId));
        }

        return $this->forward("AmttAppBundle:BlockCRUD:edit", array('id' => $blockId, '_sonata_admin' => 'sonata.admin.page_block'));
    }

    public function createBlockAction()
    {
        return $this->forward("AmttAppBundle:BlockCRUD:create", array('_sonata_admin' => 'sonata.admin.page_block'));
    }

    public function blockListAction($id)
    {
        $object = $this->admin->getObject($id);

        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $id));
        }

        $blocks = $this->getDoctrine()
            ->getRepository('AmttAppBundle:Block')
            ->findByPage($object->getId(),array('position' => 'ASC'));

        $object->getBlocks();

        $html = $this->render('AmttAppBundle:Admin:Page/block_list.html.twig', array(
            'object' => $object,
            'page' => $object
        ))->getContent();


        $datas = array();
        $datas['success'] = true;
        $datas['datas'] = $html;

        return new JsonResponse($datas);
    }

    public function deleteBlockAction($id)
    {
        $blockId = $this->get('request')->get('blockId');
        $result = array('success'=>false,'datas'=>array(),'message'=>null);

        $object = $this->getDoctrine()
            ->getRepository('AmttAppBundle:Block')
            ->find($blockId);

        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $blockId));
        }

        if (false === $this->admin->isGranted('DELETE', $object)) {
            throw new AccessDeniedException();
        }

        try {
            //$this->admin->delete($object);

            $result['success'] = true;
            $result['message'] = $this->admin->trans('flash_delete_success', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle');
        } catch (ModelManagerException $e) {

            $result['message'] = $this->admin->trans('flash_delete_error', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle');
        }

        return $this->renderJson($result);
    }

    public function contentAction($id)
    {
        $object = $this->admin->getObject($id);

        return $this->render('AmttAppBundle:Admin:Page/page_content.html.twig', array(
            'object' => $object,
        ));
    }

    public function saveBlock($id)
    {
        $object = $this->admin->getObject($id);

        var_dump($id);
    }

} 