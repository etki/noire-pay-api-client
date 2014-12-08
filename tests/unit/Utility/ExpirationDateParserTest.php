<?php
namespace Etki\Api\Clients\NoirePay\Tests\Unit\Utility;

use Etki\Api\Clients\NoirePay\Utility\ExpirationDateParser;

class ExpirationDateParserTest extends \Codeception\TestCase\Test
{
    /**
     * Generates test data.
     *
     * @return array
     * @since 0.1.0
     */
    public function dateProvider()
    {
        return array(
            array('10/20', array(10, 2020,),),
            array('9/2011', array(9, 2011,),),
            array('11 -- 15', array(11, 2015,),),
            array('10.10', array(10, 2010,),),
            array('10,11', array(10, 2011,),),
        );
    }

    /**
     * Provides invalidly formatted dates.
     *
     * @return array
     * @since 0.1.0
     */
    public function invalidDateProvider()
    {
        return array(
            array('20/20',),
            array('2020',)
        );
    }
    // tests
    /**
     * Tests date parsing.
     *
     * @param string $date           Date to parse.
     * @param int[]  $expectedResult Expected result.
     *
     * @dataProvider dateProvider
     *
     * @return void
     * @since 0.1.0
     */
    public function testDateParsing($date, $expectedResult)
    {
        $this->assertSame(
            array_values($expectedResult),
            array_values(ExpirationDateParser::parseDate($date))
        );
    }

    /**
     * Verifies that exception is thrown on wrong input.
     *
     * @dataProvider invalidDateProvider
     * @expectedException \Etki\Api\Clients\NoirePay\Exception\Utility\InvalidDateFormatException
     *
     * @return void
     * @since 0.1.0
     */
    public function testInvalidDateParsing($date)
    {
        ExpirationDateParser::parseDate($date);
    }
}
