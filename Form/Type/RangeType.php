<?php

namespace Dentiman\BootstrapBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RangeType extends AbstractType
{
    public function getName()
    {
        return 'dentiman_choice_range';
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'dentiman_choice_range';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $childOptions = array_merge($options['range_options'],array('choices'=>$options['choices']));
        $builder
            ->add('min', ChoiceType::class,$childOptions)
            ->add('max', ChoiceType::class,$childOptions)
        ;
    }



    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'compound' => true,
            'required' => false,
            'choices'            => array(),
                'range_options'         => array(
                'required' => false,
                'label'=> false,
                'attr' => ['style'=>'width:50%']
            ),

        ));
    }

    public function getParent()
    {
        return TextType::class;
    }



}