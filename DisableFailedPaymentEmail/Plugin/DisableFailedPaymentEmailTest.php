<?php
declare(strict_types=1);

namespace JamesAnelay\DisableFailedPaymentEmail\Plugin;

use JamesAnelay\DisableFailedPaymentEmail\Stubs\UnimportantStub;
use PHPUnit\Framework\TestCase;

class DisableFailedPaymentEmailTest extends TestCase
{
    private DisableFailedPaymentEmail $disableFailedPaymentEmail;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @dataProvider aroundSendPaymentFailedEmailDataProvider
     */
    public function testAroundSendPaymentFailedEmail(bool $enableEmail, int $callProceed)
    {
        list($checkoutHelper, $quote, $message, $checkoutType) = $this->getUnusedParams();

        $closureMock = new CallableStub();
        $desiredResponse = $enableEmail;
        $this->disableFailedPaymentEmail = new DisableFailedPaymentEmail(new ConfigStub($desiredResponse));

        $this->disableFailedPaymentEmail->aroundSendPaymentFailedEmail(
            $checkoutHelper,
            $closureMock,
            $quote,
            $message,
            $checkoutType
        );

        $this->assertEquals($callProceed, $closureMock->getTimesCalled());
    }

    /**
     * @return bool[]
     */
    public static function aroundSendPaymentFailedEmailDataProvider(): array
    {
        return [
            // Test 1: If the email is enabled, the proceed method should be called.
            ['enable_email' => true, 'call_proceed' => 1],
            // Test 2: If the email is disabled, the proceed method should not be called.
            ['enable_email' => false, 'call_proceed' => 0]
        ];
    }

    private function getUnusedParams()
    {
        return [
            new UnimportantStub(),
            new UnimportantStub(),
            'Example Message',
            'Example Type'
        ];
    }
}
