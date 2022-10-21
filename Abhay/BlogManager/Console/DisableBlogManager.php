<?php

namespace Abhay\BlogManager\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DisableBlogManager extends Command
{
    public function __construct(
        \Magento\Framework\Module\Manager $moduleManager,
        \Magento\Framework\Module\Status $modStatus
    ) {
        $this->_moduleManager = $moduleManager;
        $this->_modStatus = $modStatus;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('blogmanager:disable');
        $this->setDescription('Blog Manager Module Disable Command');
        
        parent::configure();
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($this->_moduleManager->isEnabled('Abhay_BlogManager')){
            $this->_modStatus->setIsEnabled(false, ['Abhay_BlogManager']);
            $output->writeln("Blog Manager module has been disabled successfully.");
        }
    }
}