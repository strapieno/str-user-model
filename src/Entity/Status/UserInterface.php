<?php
namespace Strapieno\User\Model\Entity\Status;

/**
 * Interface UserIdAwareInterface
 */
interface UserInterface
{
    /**
     * @return UserInterface
     */
    public function registered();

    /**
     * @return UserInterface
     */
    public function validated();

    /**
     * @return UserInterface
     */
    public function blocked();

    /**
     * @return string
     */
    public function getName();

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name);
}