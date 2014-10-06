<?php

namespace Forms\QuestionsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forms\QuestionsBundle\Entity\QuestionRepository")
 */
class Question
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="text")
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity="Forms\QuestionsBundle\Entity\QuestionStyle")
     */
    private $questionStyle;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set question
     *
     * @param string $question
     * @return Question
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set questionStyle
     *
     * @param \Forms\QuestionsBundle\Entity\QuestionStyle $questionStyle
     * @return Question
     */
    public function setQuestionStyle(\Forms\QuestionsBundle\Entity\QuestionStyle $questionStyle = null)
    {
        $this->questionStyle = $questionStyle;

        return $this;
    }

    /**
     * Get questionStyle
     *
     * @return \Forms\QuestionsBundle\Entity\QuestionStyle 
     */
    public function getQuestionStyle()
    {
        return $this->questionStyle;
    }
}
