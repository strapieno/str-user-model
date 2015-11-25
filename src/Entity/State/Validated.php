<?php
/**
 * Created by PhpStorm.
 * User: visa
 * Date: 24/11/15
 * Time: 20.17
 */

namespace Strapieno\User\Model\Entity\State;

/**
 * Class Validated
 */
class Validated extends AbstractUserState implements UserStateInterface
{
    /**
     * @var string
     */
    protected $name = 'validate';

    /**
     * @return Blocked
     */
    public function blocked()
    {
       return new Blocked();
    }
}