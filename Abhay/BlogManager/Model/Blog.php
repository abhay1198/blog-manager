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

namespace Abhay\BlogManager\Model;

use Magento\Framework\Model\AbstractModel;
use Abhay\BlogManager\Model\ResourceModel\Blog as ResourceModel;
use Abhay\BlogManager\Api\Data\BlogInterface;

class Blog extends AbstractModel implements BlogInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    public function getBlogId()
    {
        return $this->getData(\Abhay\BlogManager\Api\Data\BlogInterface::BLOG_ID);
    }

    public function setBlogId($blogId)
    {
        return $this->setData(\Abhay\BlogManager\Api\Data\BlogInterface::BLOG_ID, $blogId);
    }

    public function getBlogTitle()
    {
        return $this->getData(\Abhay\BlogManager\Api\Data\BlogInterface::BLOG_TITLE);
    }

    public function setBlogTitle($blogtitle)
    {
        return $this->setData(\Abhay\BlogManager\Api\Data\BlogInterface::BLOG_TITLE, $blogtitle);
    }

    public function getUrlKey()
    {
        return $this->getData(\Abhay\BlogManager\Api\Data\BlogInterface::URL_KEY);
    }

    public function setUrlKey($urlkey)
    {
        return $this->setData(\Abhay\BlogManager\Api\Data\BlogInterface::URL_KEY, $urlkey);
    }

    public function getAuthorName()
    {
        return $this->getData(\Abhay\BlogManager\Api\Data\BlogInterface::AUTHOR_NAME);
    }
    public function setAuthorName($authorname)
    {
        return $this->setData(\Abhay\BlogManager\Api\Data\BlogInterface::AUTHOR_NAME, $authorname);
    }

    public function getStatus()
    {
        return $this->getData(\Abhay\BlogManager\Api\Data\BlogInterface::STATUS);
    }
    public function setStatus($status)
    {
        return $this->setData(\Abhay\BlogManager\Api\Data\BlogInterface::STATUS, $status);
    }

    public function getContent()
    {
        return $this->getData(\Abhay\BlogManager\Api\Data\BlogInterface::CONTENT);
    }

    public function setContent($content)
    {
        return $this->setData(\Abhay\BlogManager\Api\Data\BlogInterface::CONTENT, $content);
    }

    public function getCategoryId()
    {
        return $this->getData(\Abhay\BlogManager\Api\Data\BlogInterface::CATEGORYID);
    }

    public function setCategoryId($categoryid)
    {
        return $this->setData(\Abhay\BlogManager\Api\Data\BlogInterface::CATEGORYID, $categoryid);
    }

    public function getThumbnail()
    {
        return $this->getData(\Abhay\BlogManager\Api\Data\BlogInterface::THUMBNAIL);   
    }
    
    public function setThumbnail($thumbnail)
    {
        return $this->setData(\Abhay\BlogManager\Api\Data\BlogInterface::THUMBNAIL, $thumbnail);
    }

    public function getPublishDate()
    {
        return $this->getData(\Abhay\BlogManager\Api\Data\BlogInterface::PUBLISHDATE);
    }

    public function setPublishDate($publishdate)
    {
        return $this->setData(\Abhay\BlogManager\Api\Data\BlogInterface::PUBLISHDATE, $publishdate);
    }

    public function getCreatedAt()
    {
        return $this->getData(\Abhay\BlogManager\Api\Data\BlogInterface::CREATEDAT);
    }

    public function setCreatedAt($createdat)
    {
        return $this->setData(\Abhay\BlogManager\Api\Data\BlogInterface::CREATEDAT, $createdat);
    }

    public function getUpdatedAt()
    {
        return $this->getData(\Abhay\BlogManager\Api\Data\BlogInterface::UPDATEDAT);
    }

    public function setUpdatedAt($updatedat)
    {
        return $this->setData(\Abhay\BlogManager\Api\Data\BlogInterface::UPDATEDAT, $updatedat);
    }
}