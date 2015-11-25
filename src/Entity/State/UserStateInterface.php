<?php
namespace Strapieno\User\Model\Entity\State;

use Strapieno\ModelUtils\Entity\StateInterface;

/**
 * Interface UserIdAwareInterface
 */
interface UserStateInterface extends StateInterface
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
}