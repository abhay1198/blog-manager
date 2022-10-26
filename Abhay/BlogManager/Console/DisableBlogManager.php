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
namespace Abhay\BlogManager\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


/**
 * Disable Blog Manager class
 */
class DisableBlogManager extends Command
{
    /**
     * @param Magento\Framework\Module\Manager $moduleManager
     * @param Magento\Framework\Module\Status  $modStatus
     */
    public function __construct(
        \Magento\Framework\Module\Manager $moduleManager,
        \Magento\Framework\Module\Status $modStatus
    ) {
        $this->_moduleManager = $moduleManager;
        $this->_modStatus = $modStatus;
        parent::__construct();
    }

    /**
     * Configure Function
     */
    protected function configure()
    {
        $this->setName('blogmanager:disable');
        $this->setDescription('Blog Manager Module Disable Command');
        
        parent::configure();
    }

    /**
     * Excute Function
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($this->_moduleManager->isEnabled('Abhay_BlogManager')) {
            $this->_modStatus->setIsEnabled(false, ['Abhay_BlogManager']);
            $output->writeln("Blog Manager module has been disabled successfully.");
        }
    }
}