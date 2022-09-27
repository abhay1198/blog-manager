<?php
namespace  Abhay\BlogManager\Model\Api;

use phpDocumentor\Reflection\Types\String_;
use Abhay\BlogManager\Api\BlogRepositoryInterface;
use Abhay\BlogManager\Model\ResourceModel\Blog\CollectionFactory;

class BlogDataApi implements BlogRepositoryInterface
{
    protected $_scopeConfig;
    const CONFIG_PATH_MODULE_ENABLED = 'abhay/general/enable';

    public function __construct(
        CollectionFactory $collectionFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->collection = $collectionFactory->create();
        $this->_scopeConfig = $scopeConfig;
    }

    public function getList()
    {
        $data = [];
        $i = 0;
        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $data[$i]['blog_id'] = $item->getBlogId();
            $data[$i]['blog_title'] = $item->getBlogTitle();
            $data[$i]['author_name'] = $item->getAuthorName();
            $data[$i]['status'] = $item->getStatus();
            $data[$i]['content'] = $item->getContent();
            $data[$i]['thumbnail'] = $item->getThumbnail();
            $data[$i]['category_id'] = $item->getCategoryId();
            $data[$i]['publish_date'] = $item->getPublishDate();
            $data[$i]['created_at'] = $item->getCreatedAt();
            $data[$i]['updated_at'] = $item->getUpdatedAt();
            $i++;
        }
        return $data;
    }

    // get module enable or disable status
    public function modulestatus()
    {
        $status = $this->_scopeConfig->getValue(self::CONFIG_PATH_MODULE_ENABLED, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $status;
    }
}
