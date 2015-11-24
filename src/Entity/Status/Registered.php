<?php
/**
 * Created by PhpStorm.
 * User: visa
 * Date: 24/11/15
 * Time: 20.15
 */

namespace Strapieno\User\Model\Entity\Status;

/**
 * Class Registered
 */
class Registered extends AbstractUserState implements UserInterface
{
    /**
     * @var string
     */
    protected $name = 'registered';

    /**
     * @return Validated
     */
    public function validated()
    {
        return new Validated();
    }

    /**
     * @return Blocked
     */
    public function blocked()
    {
        return new Blocked();
    }
}