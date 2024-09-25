<?php
declare(strict_types=1);

namespace JamesAnelay\DisableFailedPaymentEmail\Plugin;

class DisableFailedPaymentEmail
{
    public function __construct(private \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
    }

    public function aroundSendPaymentFailedEmail($checkoutHelper, callable $proceed, $quote, string $message, string $checkoutType)
    {
        if($this->scopeConfig->getValue('some_config_value')) {
            return $proceed($quote, $message, $checkoutType);
        }
    }
}
