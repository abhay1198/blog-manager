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

namespace Abhay\BlogManager\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\View\Asset\Repository;


/**
 * Thumbnail class
 */

class Thumbnail extends \Magento\Ui\Component\Listing\Columns\Column
{
    /**
     * @var StoreManagerInterface
     */
    private $_storeManager;

    /**
     * @var Repository
     */
    private $_assetRepo;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        StoreManagerInterface $_storeManager,
        Repository $_assetRepo,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->_storeManager = $_storeManager;
        $this->_assetRepo = $_assetRepo;
    }

     /**
      * Prepare Data Source
      *
      * @param  array $dataSource
      * @return array
      */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $path = $this->_storeManager->getStore()->getBaseUrl(
                \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
            ).'abhay/blog/thumbnail/';
            foreach ($dataSource['data']['items'] as & $item) {
                if ($item['thumbnail']) {
                    $item['thumbnail' . '_src'] = $path.$item['thumbnail'];
                    $item['thumbnail' . '_orig_src'] = $path.$item['thumbnail'];
                }
            }
        }
        return $dataSource;
    }
}
