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

namespace Abhay\BlogManager\Block\Blog;

use Magento\Framework\App\RequestInterface;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $_blog;
    protected $request;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Abhay\BlogManager\Model\BlogFactory $blogFactory,
        RequestInterface $request,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->_blog = $blogFactory;
        $this->request = $request;
        parent::__construct($context, $data);
    }

    /**
     * Preparing global layout
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('Blog Collection'));
        return $this;
    }
 
    public function getBlogCollection()
    {
        $collection = $this->_blog->create()->getCollection();
        return $collection;
    }

    public function getConfigValue($value = '') 
    {
        return $this->scopeConfig->getValue(
            $value,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
