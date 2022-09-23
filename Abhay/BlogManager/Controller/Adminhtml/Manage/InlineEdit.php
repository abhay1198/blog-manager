<?php

/**
 * @package     Abhay/BlogManager
 * @version     1.0.0
 * @author      Abhay
 * @copyright   Copyright © 2021. All Rights Reserved.
 */

namespace Abhay\BlogManager\Controller\Adminhtml\Manage;

class InlineEdit extends \Magento\Backend\App\Action
{
    private $jsonFactory;
    private $blogModel;

    /**
     * @param Action\Context $context
     * @param \Abhay\BlogManager\Model\BlogFactory $blogFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Abhay\BlogManager\Model\Blog $blogModel,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->blogModel = $blogModel;
        $this->jsonFactory = $jsonFactory;
    }
    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];
        if ($this->getRequest()->getParam('isAjax')) {
            $blogItems = $this->getRequest()->getParam('items', []);
            if (empty($blogItems)) {
                $messages[] = __('Please correct the data which you send.');
                $error = true;
            } else {
                foreach (array_keys($blogItems) as $modelid) {
                    /** @var \Magento\Cms\Model\Block $block */
                    $model = $this->blogModel->load($modelid);
                    try {
                        $model->setData(array_merge($model->getData(), $blogItems[$modelid]));
                        $model->save();
                    } catch (\Exception $e) {
                        $messages[] = "[Blog ID: {$modelid}]  {$e->getMessage()}";
                        $error = true;
                    }
                }
            }
        }
        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}
