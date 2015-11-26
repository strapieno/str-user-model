<?php
namespace Strapieno\User\Model\Entity\State;

use Strapieno\ModelUtils\Entity\StateInterface;

/**
 * Interface UserStateInterface
 */
interface UserStateInterface
{
    /**
     * @return UserStateInterface
     */
    public function registered();

    /**
     * @return UserStateInterface
     */
    public function validated();

    /**
     * @return UserStateInterface
     */
    public function blocked();
}