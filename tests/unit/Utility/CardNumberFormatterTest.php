<?php
namespace Utility;


use Etki\Api\Clients\NoirePay\Utility\CardNumberFormatter;

class CardNumberFormatterTest extends \Codeception\TestCase\Test
{
    /**
     * Unformatted card number data provider
     *
     * @return array
     * @since 0.1.0
     */
    public function cardNumberProvider()
    {
        return array(
            array('1234123412341234', '1234 1234 1234 1234',),
            array('   12345678 12345678  ', '1234 5678 1234 5678',),
            array('12345678 12345678', '1234 5678 1234 5678',),
        );
    }
    // tests
    /**
     *
     *
     * @dataProvider cardNumberProvider
     *
     * @return void
     * @since 0.1.0
     */
    public function testFormatter($input, $expectedOutput)
    {
        $formatted = CardNumberFormatter::formatCardNumber($input);
        $this->assertSame($expectedOutput, $formatted);
    }
}
