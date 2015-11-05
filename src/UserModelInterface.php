<?php

namespace Strapieno\User\Model;

use Zend\InputFilter\InputFilterAwareInterface;
use Zend\Stdlib\Hydrator\HydratorAwareInterface;
use Matryoshka\Model\DataGatewayAwareInterface;
use Matryoshka\Model\ModelInterface;
use Matryoshka\Model\ModelStubInterface;

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