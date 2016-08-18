<?php

namespace Druidvav\SimpleOauthBundle\OAuth\ResourceOwner;

use Symfony\Component\OptionsResolver\OptionsResolver;

class DiscogsResourceOwner extends GenericOAuth1ResourceOwner
{
    /**
     * {@inheritDoc}
     */
    protected $paths = array(
        'identifier'     => 'id',
        'nickname'       => 'username'
    );

    /**
     * {@inheritDoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'authorization_url' => 'http://www.discogs.com/oauth/authorize',
            'request_token_url' => 'http://api.discogs.com/oauth/request_token',
            'access_token_url'  => 'http://api.discogs.com/oauth/access_token',
            'infos_url'         => 'http://api.discogs.com/oauth/identity',
        ));
    }
} 