<?php

namespace Strapieno\User\Model\Criteria\Mongo;

use Matryoshka\Model\Wrapper\Mongo\Criteria\FindAllCriteria;

/**
 * Class UserCollectionCriteria
 */
class UserMongoCollectionCriteria extends FindAllCriteria
{
    /***
     * @param $userName
     * @return $this
     */
    public function setUserName($userName)
    {
        // TODO add hydrator
        $this->selectionCriteria['user_name'] = (string) $userName;
        return $this;
    }

    /***
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        // TODO add hydrator
        $this->selectionCriteria['email'] = (string) $email;
        return $this;
    }

    /**
     * @param $recoverPasswordToken
     * @return $this
     */
    public function setRecoverPasswordToken($recoverPasswordToken)
    {
        // TODO add hydrator
        $this->selectionCriteria['recover_password_oken'] = (string) $recoverPasswordToken;
        return $this;
    }
}