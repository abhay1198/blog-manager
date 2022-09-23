<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Abhay\BlogManager\Model;

use Magento\Framework\Model\AbstractModel;
use Abhay\BlogManager\Model\ResourceModel\Blog as ResourceModel;

class Blog extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}