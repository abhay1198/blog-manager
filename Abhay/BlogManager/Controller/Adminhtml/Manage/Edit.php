<?php
/**
 * Abhay
 * 
 * PHP version 8
 * 
 * @category  Abhay
 * @package   Abhay_BlogManager
 * @author    Abhay Agrawal <abhay@gmail.com>
 * @copyright 2022 Copyright © Abhay
 * @license   See COPYING.txt for license details.
 * @link      https://github.com/abhay1198/blog-manager
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