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
