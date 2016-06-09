<?php
namespace Strapieno\User\Model\Entity\Reference;

/**
 * Interface UserReferenceAwareInterface
 */
interface UserReferenceAwareInterface
{
    /**
     * @return UserReference|null
     */
    public function getUserReference();

    /**
     * @param UserReference $userReference
     * @return $this
     */
    public function setUserReference(UserReference $userReference);
}