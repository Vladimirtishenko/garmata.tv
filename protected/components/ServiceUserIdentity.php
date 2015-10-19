<?php

class ServiceUserIdentity extends CUserIdentity
{

    private $_id;

    const ERROR_NOT_AUTHENTICATED = 3;

    /**
     * @var EAuthServiceBase the authorization service instance.
     */
    protected $service;

    /**
     * Constructor.
     * @param EAuthServiceBase $service the authorization service instance.
     */
    public function __construct($service, $id)
    {
        $this->service = $service;
        $this->_id = $id;
    }

    /**
     * Authenticates a user based on {@link username}.
     * This method is required by {@link IUserIdentity}.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        if ($this->service->isAuthenticated) {


            $this->errorCode = self::ERROR_NONE;
        }
        else {
            $this->errorCode = self::ERROR_NOT_AUTHENTICATED;
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }

}