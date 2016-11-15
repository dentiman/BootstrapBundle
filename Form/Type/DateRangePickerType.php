<?php

namespace Dentiman\BootstrapBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class DateRangePickerType extends AbstractType
{


    public function getName()
    {
        return 'dentiman_date_range_picker';
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'dentiman_date_range_picker';
    }


    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $op = $form->getConfig()->getOptions();

        if(isset($op['pickerOptions'])){
            $view->vars = array_replace($view->vars, array(
                'pickerOptions' => $op['pickerOptions'] ,
            ));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(array(
                'pickerOptions' => array(),
            ));
    }

    public function getParent()
    {
        return TextType::class;
    }



}