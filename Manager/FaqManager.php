<?php
namespace Tms\Bundle\FaqClientBundle\Manager;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class FaqManager extends AbstractManager
{
    /**
     * {@inheritDoc}
     */
    public function getApiURL ()
    {
        return '/faqs.json';
    }

    /**
     * {@inheritDoc}
     */
    public function getObjectApiURL ()
    {
        return '/faqs/%s.json';
    }
}
