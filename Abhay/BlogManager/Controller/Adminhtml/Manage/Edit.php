<?php

/**
 * @package     Abhay/BlogManager
 * @version     1.0.0
 * @author      Abhay
 * @copyright   Copyright © 2021. All Rights Reserved.
 */

namespace Abhay\BlogManager\Controller\Adminhtml\Manage;

use Abhay\BlogManager\Controller\Adminhtml\Manage as ManageController;
use Magento\Framework\Controller\ResultFactory;

class Edit extends ManageController
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('blog_id');

        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        if (!$id) {
            $resultPage->getConfig()->getTitle()->prepend(
                __('New Blog')
            );
        } else {
            $resultPage->getConfig()->getTitle()->prepend(
                __('Edit Blog')
            );
        }
        
        return $resultPage;
    }
}