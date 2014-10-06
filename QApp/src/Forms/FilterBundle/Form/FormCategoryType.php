<?php

namespace Forms\FilterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FormCategoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('formDomain', 'entity', array('class' => 'FormsFilterBundle:FormDomain', 'property' => 'domain'))
            ->add('category')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Forms\FilterBundle\Entity\FormCategory'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'forms_filterbundle_formcategory';
    }
}
