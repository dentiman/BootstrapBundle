<?php
// https://github.com/davidstutz/bootstrap-multiselect

namespace Dentiman\BootstrapBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class MultiChoiceType extends AbstractType
{
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $op = $form->getConfig()->getOptions();

        if(isset($op['multiselectOptions'])){
            $view->vars = array_replace($view->vars, array(
                'multiselectOptions' => $op['multiselectOptions'] ,
            ));
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'attr' => array(
                'class' => 'multiselect'
            ),
            'expanded'     => false,
            'multiple'     => true,
            'empty_value'  => '',
            'multiselectOptions' => array()

        ));
    }

    public function getParent()
    {
        return 'choice';
    }

    public function getName()
    {
        return 'dentiman_multi_choice';
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'dentiman_multi_choice';
    }
}