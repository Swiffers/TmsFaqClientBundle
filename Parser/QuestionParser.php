<?php
namespace Tms\Bundle\FaqClientBundle\Parser;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class QuestionParser extends AbstractParser
{
    /**
     * @var ResponseParser
     */
    protected $responseParser;

    /**
     * ResponseParser constructor
     *
     * @param ParserInterface $responseParser
     */
    public function __construct (ParserInterface $responseParser)
    {
        $this->responseParser = $responseParser;
    }

    /**
     * {@inheritDoc}
     */
    protected function populateObject ($object, array &$data)
    {
        if(isset($data['responses'])) {
            $responses = $this->responseParser->parse($data['responses'], true, 'array');
            foreach ($responses as $response) {
                $object->addResponse($response);
                $response->SetFaq($object);
            }
            unset($data['responses']);
        }

        return $object;
    }

    /**
     * {@inheritDoc}
     */
    public function getClassName ()
    {
        return 'Tms\Bundle\FaqClientBundle\Model\Question';
    }
}
