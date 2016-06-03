<?php
namespace Strapieno\User\ModelTest\Entity;

use Strapieno\User\Model\Entity\UserEntity;

/**
 * Class UserEntity
 */
class UserEntityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UserEntity
     */
    protected $entity;

    public function setUp()
    {
        $this->entity = new UserEntity();
    }

    public function testGetSetUsername()
    {
        $input = 'test';
        $this->entity->setUserName($input);
        $this->assertSame($input, $this->entity->getUserName());
    }

    public function testGetSetBirthDate()
    {
        $input = new \DateTime();
        $this->entity->setBirthDate($input);
        $this->assertSame($input, $this->entity->getBirthDate());
    }

    public function testGetSetEmail()
    {
        $input = 'test';
        $this->entity->setEmail($input);
        $this->assertSame($input, $this->entity->getEmail());
    }

    public function testGetSetLastName()
    {
        $input = 'test';
        $this->entity->setLastName($input);
        $this->assertSame($input, $this->entity->getLastName());
    }

    public function testGetSetFirstName()
    {
        $input = 'test';
        $this->entity->setFirstName($input);
        $this->assertSame($input, $this->entity->getFirstName());
    }

    public function testGetSetIdentity()
    {
        $input = 'test';
        $this->entity->setUserName($input);
        $this->assertSame($input, $this->entity->getIdentity());
    }


}