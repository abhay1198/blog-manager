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

use Magento\Backend\App\Action;
use Magento\TestFramework\ErrorLog\Logger;
use Magento\Ui\Component\MassAction\Filter;

class MassDisable extends \Magento\Backend\App\Action
{
    protected $_filter;
    protected $_blog;

    public function __construct(
        \Magento\Ui\Component\MassAction\Filter $filter,
        Action\Context $context,
        \Abhay\BlogManager\Model\BlogFactory $blogFactory
    ) {
        $this->_filter = $filter;
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
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $blogModel = $this->_blog->create();
        $collection = $this->_filter->getCollection($blogModel->getCollection());
        foreach ($collection as $blog) {
            $blog->setStatus(0);
            $blog->save();
        }
        $this->messageManager->addSuccess(__('Blog(s) disabled successfully.'));
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/');
    }
}