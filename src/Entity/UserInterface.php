<?php

namespace Strapieno\User\Model\Entity;

use DateTime;
use Strapieno\ModelUtils\Entity\DateHistoryAwareInterface;
use Strapieno\ModelUtils\Entity\EntityInterface;
use Strapieno\ModelUtils\Entity\PasswordAwareInterface;
use Strapieno\ModelUtils\Entity\RercoverPasswordAwareInterface;
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
    RercoverPasswordAwareInterface
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