<?php
namespace Tms\Bundle\FaqClientBundle\Manager;

use Da\ApiClientBundle\HttpClient\RestApiClientInterface;
use Symfony\Component\HttpFoundation\Request;
use Tms\Bundle\FaqClientBundle\Parser\ParserInterface;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class AbstractManager implements ManagerInterface
{
    /**
     * @var RestApiClientInterface
     */
    protected $faqApi;

    /**
     * @var ParserInterface
     */
    protected $parser;

    /**
     * contructor
     *
     * @param RestApiClientInterface $faqApi
     * @param ParserInterface $parser Instance of an object parser
     */
    public function __construct (RestApiClientInterface $faqApi, ParserInterface $parser)
    {
        $this->faqApi = $faqApi;
        $this->parser = $parser;
    }

    /**
     * {@inheritDoc}
     */
    public function findAll (array $parameters = array())
    {
        $data = $this->faqApi->get($this->getApiURL(), $parameters);

        return $this->parser->parse($data, true, $this->getApiFormat());
    }

    /**
     * {@inheritDoc}
     */
    public function findOneById ($id)
    {
        $data = $this->faqApi->get(sprintf($this->getObjectApiURL(), $id), array());

        return $this->parser->parse($data, false, $this->getApiFormat());
    }

    /**
     * {@inheritDoc}
     */
    public function findOneBy (array $parameters)
    {
        $data = $this->faqApi->get($this->getApiURL(), $parameters );

        return $this->parser->parse($data, false, $this->getApiFormat());
    }

    /**
     * {@inheritDoc}
     */
    public function getApiURL ()
    {
        return '';
    }

    /**
     * {@inheritDoc}
     */
    public function getObjectApiURL ()
    {
        return '%s';
    }

    /**
     * {@inheritDoc}
     */
    public function getApiFormat ()
    {
        return 'json';
    }
}
