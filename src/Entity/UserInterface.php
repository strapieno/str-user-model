<?php

namespace Strapieno\User\Model\Entity;

use DateTime;
use Strapieno\User\Model\Entity\State\UserStateAwareInterface;
use Strapieno\Utils\Model\Entity\DateHistoryAwareInterface;
use Strapieno\Utils\Model\Entity\EntityInterface;
use Strapieno\Utils\Model\Entity\IdentityExistAwareInterface;
use Strapieno\Utils\Model\Entity\PasswordAwareInterface;
use Strapieno\Utils\Model\Entity\RercoverPasswordAwareInterface;
use Zend\Permissions\Acl\Role\RoleInterface;
use Zend\Stdlib\Hydrator\HydratorAwareInterface;


/**
 * Class UserInterface
 */
interface UserInterface extends
    EntityInterface,
    DateHistoryAwareInterface,
    HydratorAwareInterface,
    UserIndentityAwareInterface,
    RoleInterface,
    PasswordAwareInterface,
    RercoverPasswordAwareInterface,
    UserStateAwareInterface,
    IdentityExistAwareInterface
{

    /**
     * @return string
     */
    public function getUserName();

    /**
     * @param string $userName
     * @return $this
     */
    public function setUserName($userName);

    /**
     * @return DateTime
     */
    public function getBirthDate();

    /**
     * @param DateTime $birthDate
     * @return $this
     */
    public function setBirthDate(DateTime $birthDate = null);

    /**
     * @return array
     */
    public function getEmail();

    /**
     * @param array $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName);

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName);
}