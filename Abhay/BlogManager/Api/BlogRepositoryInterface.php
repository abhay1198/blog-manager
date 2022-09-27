<?php

/**
 * @package     Abhay/BlogManager
 * @version     1.0.0
 * @author      Abhay
 * @copyright   Copyright © 2021. All Rights Reserved.
 */

namespace  Abhay\BlogManager\Api;

use phpDocumentor\Reflection\Types\String_;

interface BlogRepositoryInterface
{
    /**
     * Returns blog data to user
     *
     * @api
     * @param  string $id blog id.
     * @return return blog array collection.
     */
    public function getList();
}
