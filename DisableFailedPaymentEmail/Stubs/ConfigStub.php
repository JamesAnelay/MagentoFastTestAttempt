<?php
declare(strict_types=1);

namespace JamesAnelay\DisableFailedPaymentEmail\Stubs;

use Magento\Framework\App\Config\ScopeConfigInterface;

class ConfigStub implements ScopeConfigInterface
{
    public function __construct(private $desiredResponse)
    {
    }

    public function getValue($path, $scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null)
    {
        return $this->desiredResponse;
    }

    public function isSetFlag($path, $scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null)
    {
        return $this->desiredResponse;
    }
}
