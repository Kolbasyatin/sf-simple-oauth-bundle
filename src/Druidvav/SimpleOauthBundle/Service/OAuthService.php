<?php
namespace Druidvav\SimpleOauthBundle\Service;

use Druidvav\SimpleOauthBundle\Exception\ServiceNotFoundException;
use Druidvav\SimpleOauthBundle\Service;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpFoundation\Request;

class OAuthService
{
    use ContainerAwareTrait;

    /**
     * @param $id
     * @return Service|object
     * @throws ServiceNotFoundException
     */
    public function getService($id)
    {
        if (!$this->container->has('dv.oauth.service.' . $id)) {
            throw new ServiceNotFoundException();
        }
        $service = $this->container->get('dv.oauth.service.' . $id);
        return $service;
    }

    /**
     * @param Request $request
     * @return Service|object
     * @throws ServiceNotFoundException
     */
    public function getServiceByRequest(Request $request)
    {
        $service = $this->getService($request->get('service'));
        if (!$service->getResourceOwner()->handles($request)) {
            throw new ServiceNotFoundException();
        }
        return $service;
    }
}