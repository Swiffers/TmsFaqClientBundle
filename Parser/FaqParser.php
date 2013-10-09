<?php
namespace Tms\Bundle\FaqClientBundle\Parser;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class FaqParser extends AbstractParser
{
    /**
     * @var QuestionCategoryParser
     */
    protected $questionCategoryParser;

    /**
     * @var QuestionCategoryParser
     */
    protected $questionParser;

    /**
     * FaqParser constructor
     *
     * @param ParserInterface $questionCategoryParser
     * @param ParserInterface $questionParser
     */
    public function __construct (ParserInterface $questionCategoryParser, ParserInterface $questionParser)
    {
        $this->questionCategoryParser = $questionCategoryParser;
        $this->questionParser = $questionParser;
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
                //$questionCategory->SetFaq($object);
            }
            unset($data['questionCategories']);
        }
        if(isset($data['questions'])) {
            $questions = $this->questionParser->parse($data['questions'], true, 'array');
            foreach ($questions as $question) {
                $object->addQuestion($question);
                //$questionCategory->SetFaq($object);
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
        return 'Tms\Bundle\FaqClientBundle\Model\Faq';
    }
}
