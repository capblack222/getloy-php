<?php declare(strict_types=1);

namespace Getloy;

use \Exception;
use Getloy\PaymentProviders\PaymentProvider;
use Getloy\PaymentProviders\PaymentProviderPaywayKh;
use Getloy\PaymentProviders\PaymentProviderPipayKh;
use Getloy\PaymentProviders\PaymentProviderIpay88Kh;

/**
 * Provides payment provider identifiers and a factory method to instantiate payment method classes.
 * @since 1.0.0
 */
class PaymentProviders
{
    /* Payment provider identifier for PayWay by ABA Bank */
    const PAYWAY_KH = 'payway_kh';
    /* Payment provider identifier for Pi Pay */
    const PIPAY_KH = 'pipay_kh';
    /* Payment provider identifier for iPay88 Cambodia */
    const IPAY88_KH = 'ipay88_kh';

    /**
     * Creates a GetloyPaymentProvider object for the specified provider.
     * @param string $paymentMethod Payment method identifier.
     * @param array $config Configuration for the payment method.
     * @return PaymentProvider The payment provider object.
     * @throws Exception If the provided payment method is unsupported or the payment method
     *                   configuration is incomplete.
     * @ignore description
     */
    public static function paymentProviderFactory(
        string $paymentMethod,
        array $config
    ): PaymentProvider {

        switch ($paymentMethod) {
            case self::PAYWAY_KH:
                return new PaymentProviderPaywayKh($config);

            case self::PIPAY_KH:
                return new PaymentProviderPipayKh($config);

            case self::IPAY88_KH:
                return new PaymentProviderIpay88Kh($config);

            default:
                throw new Exception('Unsupported payment method ' . $paymentMethod);
        }
    }
}
