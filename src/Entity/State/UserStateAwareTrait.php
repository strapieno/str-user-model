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
     * @var UserStateInterface
     */
    protected $state;

    /**
     * @return UserStateInterface|null
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param UserStateInterface $state
     * @return $this
     */
    public function setState(UserStateInterface $state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return UserInterface
     */
    public function registered()
    {
        $this->setState($this->state->registered());
    }

    /**
     * @return UserInterface
     */
    public function validated()
    {
        $this->setState($this->state->validated());
    }

    /**
     * @return UserInterface
     */
    public function blocked()
    {
        $this->setState($this->state->blocked());
    }
}