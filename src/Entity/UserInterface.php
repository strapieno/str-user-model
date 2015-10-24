<?php

namespace Strapieno\User\Model\Entity;

use Strapieno\ModelUtils\Entity\DateHistoryAwareInterface;
use Strapieno\ModelUtils\Entity\EntityInterface;
use Zend\Stdlib\Hydrator\HydratorAwareInterface;

/**
 * Class UserInterface
 */
interface UserInterface extends
    EntityInterface,
    DateHistoryAwareInterface,
    HydratorAwareInterface,
    UserIndentityAwareInterface
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
    public function setBirthDate(DateTime $birthDate);

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