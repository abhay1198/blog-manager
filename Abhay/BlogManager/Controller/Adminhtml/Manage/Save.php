<?php

/**
 * @package     Abhay/BlogManager
 * @version     1.0.0
 * @author      Abhay
 * @copyright   Copyright © 2021. All Rights Reserved.
 */

namespace Abhay\BlogManager\Controller\Adminhtml\Manage;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Backend\App\Action;

class Save extends \Magento\Backend\App\Action
{
    protected $_blog;
    /**
     * @param Action\Context $context
     * @param \Abhay\BlogManager\Model\BlogFactory $blogFactory
     */
    public function __construct(
        Action\Context $context,
        \Abhay\BlogManager\Model\BlogFactory $blogFactory
    ) {
        $this->_blog = $blogFactory;
        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Abhay_BlogManager::manage');
    }

    /**
     * Save action.
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $time = date('Y-m-d H:i:s');
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getParams();
        if ($data) {
            $data['content'] = strip_tags($data['content']);
            $id = (int) $this->getRequest()->getParam('blog_id');
            $model = $this->_blog->create();
            $data['updated_at'] = $time;

            // to save the category id 
            $category = implode(',', $data['category_id']);

            // to save the URL key
            $url_key1 = $data['url_key'];
            $url_key2 = $data['blog_title'];
            if ($url_key1) {
                $key1 = str_replace(' ', '-', strtolower($url_key1));
                $data['url_key'] = $key1;
            } else {
                $key2 = str_replace(' ', '-', strtolower($url_key2));
                $data['url_key'] = $key2;
            }

            // to save the image 
            if (isset($data['thumbnail'][0]['name'])) {
                $data['thumbnail'] = $data['thumbnail'][0]['name'];
            } else {
                $data['thumbnail'] = null;
            }

            // to update and crate the blog in DB
            if ($id) {
                $data['category_id'] = $category;
                $model->addData($data)->setId($id)->save();
            } else {
                unset($data['blog_id']);
                $data['created_at'] = $time;
                $data['category_id'] = $category;
                $model->setData($data)->save();
            }
        }
        $this->messageManager->addSuccess(__('Blog saved successfully.'));

        return $resultRedirect->setPath('*/*/');
    }
}