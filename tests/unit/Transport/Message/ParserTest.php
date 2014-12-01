<?php
namespace Transport\Message;


use Etki\Api\Clients\NoirePay\Transport\Message\Parser;

class ParserTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function inputDataProvider()
    {
        return array(
            array(
                '
                REQUEST.VERSION=1.0
                SECURITY.SENDER=123a456b789c123d456e789f012g345

                USER.LOGIN=123456781234567812345678abcdabcd
                USER.PWD=geheim

                TRANSACTION.MODE=LIVE
                TRANSACTION.RESPONSE=SYNC
                TRANSACTION.CHANNEL=546a456b789c123d456e789f012g821

                IDENTIFICATION.TRANSACTIONID=MerchantAssignedID
                IDENTIFICATION.SHOPPERID=customerid12345
                IDENTIFICATION.INVOICEID=20090100012
                ',
                array(
                    'REQUEST' => array(
                        'VERSION' => '1.0',
                    ),
                    'SECURITY' => array(
                        'SENDER' => '123a456b789c123d456e789f012g345',
                    ),
                    'USER' => array(
                        'LOGIN' => '123456781234567812345678abcdabcd',
                        'PWD' => 'geheim',
                    ),
                    'TRANSACTION' => array(
                        'MODE' => 'LIVE',
                        'RESPONSE' => 'SYNC',
                        'CHANNEL' => '546a456b789c123d456e789f012g821',
                    ),
                    'IDENTIFICATION' => array(
                        'TRANSACTIONID' => 'MerchantAssignedID',
                        'SHOPPERID' => 'customerid12345',
                        'INVOICEID' => '20090100012',
                    ),
                )
            ),
        );
    }

    // tests
    /**
     *
     * @dataProvider inputDataProvider
     *
     * @return void
     * @since
     */
    public function testMe($input, $expectedResult)
    {
        $result = Parser::parse($input);
        foreach (array(&$result, &$expectedResult) as &$source) {
            foreach ($source as &$item) {
                sort($item);
            }
            unset($item);
        }
        unset($source);
        $this->assertSame($expectedResult, $result);
    }
}
