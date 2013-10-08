<?php
namespace Tms\Bundle\FaqClientBundle\Manager;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class ConsumerSearchManager extends AbstractManager
{
    /**
     * {@inheritDoc}
     */
    public function getApiURL ()
    {
        return '/consumerSearchs.json';
    }
}
