<?php
namespace Transport\Message;


use Etki\Api\Clients\NoirePay\Transport\Message\Renderer;

class RendererTest extends \Codeception\TestCase\Test
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

    public function inputProvider()
    {
        return array(
            array(
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
                ),
                'REQUEST.VERSION=1.0

SECURITY.SENDER=123a456b789c123d456e789f012g345

USER.LOGIN=123456781234567812345678abcdabcd
USER.PWD=geheim

TRANSACTION.MODE=LIVE
TRANSACTION.RESPONSE=SYNC
TRANSACTION.CHANNEL=546a456b789c123d456e789f012g821

IDENTIFICATION.TRANSACTIONID=MerchantAssignedID
IDENTIFICATION.SHOPPERID=customerid12345
IDENTIFICATION.INVOICEID=20090100012',
            )
        );
    }

    // tests

    /**
     *
     *
     * @dataProvider inputProvider
     *
     * @return void
     * @since
     */
    public function testMe($input, $expectedOutput)
    {
        $render = Renderer::render($input);
        $this->assertSame($expectedOutput, $render);
    }
}