<?php

/**
 * @package     Abhay/BlogManager
 * @version     1.0.0
 * @author      Abhay
 * @copyright   Copyright © 2021. All Rights Reserved.
 */

namespace Abhay\BlogManager\Api\Data;

interface BlogInterface
{
    const BLOG_ID = 'blog_id';
    const BLOG_TITLE = 'blog_title';
    const URL_KEY = 'url_key';
    const AUTHOR_NAME = 'author_name';
    const STATUS = 'status';
    const CONTENT = 'content';
    const CATEGORYID = 'category_id';
    const THUMBNAIL = 'thumbnail';
    const PUBLISHDATE = 'publish_date';
    const CREATEDAT = 'created_at';
    const UPDATEDAT = 'updated_at';

    public function getBlogId();
    public function setBlogId($blogId);

    public function getBlogTitle();
    public function setBlogTitle($blogtitle);

    public function getUrlKey();
    public function setUrlKey($urlkey);

    public function getAuthorName();
    public function setAuthorName($authorname);

    public function getStatus();
    public function setStatus($status);

    public function getContent();
    public function setContent($content);

    public function getCategoryId();
    public function setCategoryId($categoryid);

    public function getThumbnail();
    public function setThumbnail($thumbnail);

    public function getPublishDate();
    public function setPublishDate($publishdate);

    public function getCreatedAt();
    public function setCreatedAt($createdat);

    public function getUpdatedAt();
    public function setUpdatedAt($updatedat);
}
