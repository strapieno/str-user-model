<?php
/**
 * Created by PhpStorm.
 * User: visa
 * Date: 24/11/15
 * Time: 20.29
 */

namespace Strapieno\User\Model\Entity\State;

/**
 * Class UserStatusAwareTrait
 */
trait UserStateAwareTrait
{
    /**
     * @var UserInterface
     */
    protected $state;

    /**
     * @return UserInterface
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param UserInterface $state
     * @return $this
     */
    public function setState(UserStateInterface $state)
    {
        $this->state = $state;
        return $this;
    }
}