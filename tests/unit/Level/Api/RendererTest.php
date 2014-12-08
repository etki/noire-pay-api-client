<?php
namespace Transport\Message;


use Etki\Api\Clients\NoirePay\Level\Api\Renderer;

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

    public function plainInputProvider()
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
    public function inputProvider()
    {
        return array(
            array(
                array(
                    'test' => array('a' => '12  ', 'b' => '12',),
                    'n' => array('x' => 13,),
                    //'d.z' => 13,
                    'd' => array('z' => 13,),
                ),
                array(
                    'test',
                    null,
                    'n',
                    null,
                    'z',
                    null,
                    'd',
                    null
                ),
                'TEST.A=12  ' . PHP_EOL .
                'TEST.B=12' . PHP_EOL .
                PHP_EOL .
                'N.X=13' . PHP_EOL .
                PHP_EOL .
                'D.Z=13',
            ),
        );
    }

    // tests

    /**
     *
     *
     * @dataProvider plainInputProvider
     *
     * @return void
     * @since
     */
    public function testPlainRendering($input, $expectedOutput)
    {
        $render = Renderer::renderPlain($input);
        $this->assertSame($expectedOutput, $render);
    }

    /**
     *
     *
     * @param $input
     * @param $schema
     * @param $expectedOutput
     *
     * @dataProvider inputProvider
     *
     * @return void
     * @since 0.1.0
     */
    public function testSchemaRendering(array $input, array $schema, $expectedOutput)
    {
        $render = Renderer::render($input, $schema);
        $this->assertSame(trim($expectedOutput), $render);
    }
}