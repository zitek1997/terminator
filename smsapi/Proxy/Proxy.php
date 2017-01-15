<?php

namespace SMSApi\Proxy;

use SMSApi\Api\Action\AbstractAction;
use SMSApi\Client;
use SMSApi\Exception\ProxyException;

interface Proxy
{
    /**
     * @param AbstractAction $action
     * @return string
     * @throws ProxyException
     */
	public function execute(AbstractAction $action);

    /**
     * @return string|null
     */
	public function getProtocol();

    /**
     * @return string|null
     */
	public function getHost();

    /**
     * @return int|null
     */
	public function getPort();

    /**
     * @param Client $client
     * @return $this
     */
    public function setBasicAuthentication(Client $client);

    /**
     * @param string $token
     * @return $this
     */
    public function setToken($token);
}
