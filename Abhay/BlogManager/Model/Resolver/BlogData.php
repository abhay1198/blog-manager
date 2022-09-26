<?php

/**
 * @package     Abhay/BlogManager
 * @version     1.0.0
 * @author      Abhay
 * @copyright   Copyright © 2021. All Rights Reserved.
 */

namespace Abhay\BlogManager\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Abhay\BlogManager\Model\ResourceModel\Blog\CollectionFactory;

class BlogData implements ResolverInterface
{
    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collection = $collectionFactory->create();
    }
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $blogId = $this->getBlogsId($args);
        $blogsData = $this->getBlogsData($blogId);
        return $blogsData;
    }

    private function getBlogsId(array $args): int
    {
        if (!isset($args['blog_id'])) {
            throw new GraphQlInputException(__('"blogs id should be specified'));
        }
        return (int)$args['blog_id'];
    }

    private function getBlogsData(int $blogId): array
    {
        try {
            if (isset($this->loadedData)) {
                return $this->loadedData;
            }
            $items = $this->collection->addFieldToFilter("blog_id", ["eq"=>$blogId])->getItems();
            foreach ($items as $model) {
                $blogData = [
                    'blog_id' => $model->getBlogId(),
                    'blog_title' => $model->getBlogTitle(),
                    'author_name' => $model->getAuthorName(),
                    'status' => $model->getStatus(),
                    'content' => $model->getContent(),
                    'thumbnail' => $model->getThumbnail(),
                    'url_key' => $model->getUrlKey(),
                    'category_id' => $model->getCategoryId(),
                    'publish_date' => $model->getPublishDate(),
                    'created_at' => $model->getCreatedAt(),
                    'updated_at' => $model->getUpdatedAt(),
                ];
            }
        } catch (NoSuchEntityException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);
        }
        return $blogData;
    }
}
