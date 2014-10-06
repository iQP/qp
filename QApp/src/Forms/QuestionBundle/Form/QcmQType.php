<?php

namespace Forms\QuestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Forms\AnswerBundle\Form\QcmAType;

class QcmQType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', 'entity', array('class' => 'FormsFilterBundle:QuestionCategory', 'property' => 'category', 'empty_value' => '(Facultatif)', 'required' => false))
            ->add('question')
            ->add('qcma', 'collection', array('type' => new QcmAType(), 'allow_add' => true, 'by_reference' => false, 'allow_delete' => true, 'prototype_name' => '__qcma__', 'label' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Forms\QuestionBundle\Entity\QcmQ'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'forms_questionbundle_qcmq';
    }
}
