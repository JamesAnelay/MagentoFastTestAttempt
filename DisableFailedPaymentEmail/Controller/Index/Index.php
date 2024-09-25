<?php
declare(strict_types=1);

namespace JamesAnelay\DisableFailedPaymentEmail\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    /*This file was just used to check that the plugins don't are about param types*/

    protected $title;

    public function execute()
    {
        echo $this->setTitle('Welcome',6);
        echo $this->getTitle();
    }

    public function setTitle(string $title, int $number)
    {
        return $this->title = $title . $number;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

