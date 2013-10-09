<?php
namespace Tms\Bundle\FaqClientBundle\Parser;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class QuestionParser extends AbstractParser
{
    /**
     * @var QuestionCategoryParser
     */
    protected $questionCategoryParser;

    /**
     * @var ResponseParser
     */
    protected $responseParser;

    /**
     * QuestionParser constructor
     *
     * @param ParserInterface $questionCategoryParser
     * @param ParserInterface $responseParser
     */
    public function __construct (ParserInterface $questionCategoryParser, ParserInterface $responseParser)
    {
        $this->questionCategoryParser = $questionCategoryParser;
        $this->responseParser = $responseParser;
    }

    /**
     * {@inheritDoc}
     */
    protected function populateObject ($object, array &$data)
    {
        if(isset($data['questionCategories'])) {
            $questionCategories = $this->questionCategoryParser->parse($data['questionCategories'], true, 'array');
            foreach ($questionCategories as $questionCategory) {
                $object->addQuestionCategory($questionCategory);
                //$questionCategory->addQuestion($object);
            }
            unset($data['questionCategories']);
        }
        if(isset($data['responses'])) {
            $responses = $this->responseParser->parse($data['responses'], true, 'array');
            foreach ($responses as $response) {
                $object->addResponse($response);
                //$response->setQuestion($object);
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
