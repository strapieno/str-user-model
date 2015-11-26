<?php

namespace Strapieno\User\Model;

use Matryoshka\Model\ModelInterface;

/**
 * Interface UserModelInterface
 */
interface UserModelInterface extends ModelInterface
{
    /**
     * @param string $nameField
     * @param string $valueFiled
     * @return \Matryoshka\Model\ResultSet\ResultSetInterface|mixed|null
     */
    public function getAuthenticationUser($nameField, $valueFiled);
}