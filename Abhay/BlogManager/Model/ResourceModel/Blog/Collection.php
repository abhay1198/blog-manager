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
namespace Abhay\BlogManager\Model\ResourceModel\Blog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Abhay\BlogManager\Model\Blog as Model;
use Abhay\BlogManager\Model\ResourceModel\Blog as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}