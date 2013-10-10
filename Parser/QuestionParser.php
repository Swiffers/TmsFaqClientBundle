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
     * Categories
     * 
     * @var array
     */
    protected $categories;

    /**
     * QuestionParser constructor
     *
     * @param ParserInterface $responseParser
     */
    public function __construct (ParserInterface $responseParser)
    {
        $this->responseParser         = $responseParser;
        $this->categories             = null;
    }

    /**
     * Set categories
     * 
     * @param array $categories All known categories
     */
    public function setCategories(array $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Get categories
     * 
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * {@inheritDoc}
     */
    protected function populateObject ($object, array &$data)
    {
        if (isset($data['questionCategories'])) {
            foreach ($data['questionCategories'] as $c) {
                if (isset($this->categories[$c['id']])) {
                    $questionCategory = $this->categories[$c['id']];

                    $object->addQuestionCategory($questionCategory);
                    $questionCategory->addQuestion($object);
                }
            }
            unset($data['questionCategories']);
        }
        
        if (isset($data['responses'])) {
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
