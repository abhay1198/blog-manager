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

namespace Abhay\BlogManager\Block\Adminhtml\Blog\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class Blog DeleteButton
 */
class DeleteButton implements ButtonProviderInterface
{
    protected $request;

    protected $context;

    public function __construct(
        Context $context,
        \Magento\Framework\App\Request\Http $request
    ) {
        $this->request = $request;
        $this->context = $context;
    }

    /**
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        if ($this->request->getParam('blog_id')) {
            $data = [
                'label' => __('Delete Blog'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to do this?'
                ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->context->getUrlBuilder()
            ->getUrl('*/*/delete', ['id' => $this->request->getParam('blog_id')]);
    }
}