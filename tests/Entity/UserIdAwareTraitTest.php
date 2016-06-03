<?php
namespace Strapieno\User\ModelTest\Entity;

use Strapieno\User\Model\Entity\UserIdAwareTrait;

class UserIdAwareTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UserIdAwareTrait
     */
    protected $trait;

    public function setUp()
    {
        $this->trait = $this->getMockForTrait('Strapieno\User\Model\Entity\UserIdAwareTrait');
    }

    public function testGetSetUserId()
    {
        $input = 'test';
        $this->trait->setUserId($input);
        $this->assertSame($input, $this->trait->getUserId());
    }
}