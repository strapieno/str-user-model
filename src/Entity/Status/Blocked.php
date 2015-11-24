<?php
/**
 * Created by PhpStorm.
 * User: visa
 * Date: 24/11/15
 * Time: 20.17
 */

namespace Strapieno\User\Model\Entity\Status;

/**
 * Class Blocked
 */
class Blocked extends AbstractUserState implements UserInterface
{
    /**
     * @var string
     */
    protected $name = 'blocked';

    /**
     * @return Validated
     */
    public function validated()
    {
        return new Validated();
    }
}