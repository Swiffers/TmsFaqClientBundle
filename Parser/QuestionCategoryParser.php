<?php
namespace Tms\Bundle\FaqClientBundle\Parser;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class QuestionCategoryParser extends AbstractParser
{
    /**
     * @var QuestionParser
     */
    protected $questionParser;

    /**
     * QuestionParser constructor
     *
     * @param ParserInterface $questionParser
     */
    public function __construct (ParserInterface $questionParser)
    {
        $this->questionParser = $questionParser;
    }

    /**
     * {@inheritDoc}
     */
    protected function populateObject ($object, array &$data)
    {
        if(isset($data['questions'])) {
            $questions = $this->questionParser->parse($data['questions'], true, 'array');
            foreach ($questions as $question) {
                $object->addQuestion($question);
                //$question->setQuestionCategory($object);
            }
            unset($data['questions']);
        }

        return $object;
    }

    /**
     * {@inheritDoc}
     */
    public function getClassName ()
    {
        return 'Tms\Bundle\FaqClientBundle\Model\QuestionCategory';
    }
}
