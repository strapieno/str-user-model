<?php
namespace Strapieno\User\Model\Entity\Reference;

/**
 * Class UserReferenceAwareTrait
 */
trait UserReferenceAwareTrait
{
    /**
     * @var
     */
    protected $userReference;

    /**
     * @return UserReference|null
     */
    public function getUserReference()
    {
        return $this->userReference;
    }

    /**
     * @param UserReference $userReference
     * @return $this
     */
    public function setUserReference(UserReference $userReference)
    {
        $this->userReference = $userReference;
        return $this;
    }
}