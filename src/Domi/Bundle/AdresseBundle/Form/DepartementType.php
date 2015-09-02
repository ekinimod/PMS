<?php

namespace Domi\Bundle\AdresseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DepartementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code')
            ->add('nom')
            ->add('nomUppercase')
            ->add('slug')
            ->add('nomSoundex')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Domi\Bundle\AdresseBundle\Entity\Departement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'domi_bundle_adressebundle_departement';
    }
}
