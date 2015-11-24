<?php
/**
 * Created by PhpStorm.
 * User: visa
 * Date: 24/11/15
 * Time: 20.29
 */

namespace Strapieno\User\Model\Entity\Status;

/**
 * Class UserStatusAwareTrait
 */
trait UserStatusAwareTrait
{
    /**
     * @var UserInterface
     */
    protected $status = new Registered();

    /**
     * @return UserInterface
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param UserInterface $status
     * @return $this
     */
    public function setStatus(UserInterface $status)
    {
        $this->status = $status;
        return $this;
    }
}