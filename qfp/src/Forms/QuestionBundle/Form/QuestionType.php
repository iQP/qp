<?php

namespace Forms\QuestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Forms\QuestionBundle\Form\Question;

class QuestionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question')
            // ->add('form')
            ->add('type', 'entity', array('class' => 'FormsQuestionBundle:Type', 'property' => 'type', 'label' => 'Type de réponse', 'empty_value' => 'Choisissez un type de réponse'))
            // ->add('answer', 'entity', array('class' => 'FormsAnswerBundle:Answer', 'empty_value' => '', ))
        ;

        // $formModifier = function(FormInterface $form, Question $question = null) {
        //         $types = null === $type ? array() : $type->getTypes();

        //     $form->add('types', 'entity', array('class' => 'FormsQuestionBundle:Type', 'empty_value' => '', 'choices' => $types));
        // };

        // $builder->addEventListener(
        //     FormEvents::PRE_SET_DATA,

        //     function(FormEvent $event) use ($formModifier) {

        //         $data = $event->getData();

        //         $formModifier($event->getForm(), $data->getAnswer());
        //     }
        // );

        // $builder->get('question')->addEventListener(
        //     FormEvents::POST_SUBMIT,

        //     function(FormEvent $event) use ($formModifier) {

        //         $question = $event->getForm()->getData();

        //         $formModifier($event->getForm()->getParent(), $question);
        //     }

        // );
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Forms\QuestionBundle\Entity\Question'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'forms_questionbundle_question';
    }
}
