<?php
declare(strict_types=1);

namespace JamesAnelay\DisableFailedPaymentEmail\Plugin;

class CallableStub
{
    private $timesCalled = 0;

    public function __invoke() {
        $this->timesCalled++;
    }

    public function getTimesCalled(){
        return $this->timesCalled;
    }
}
