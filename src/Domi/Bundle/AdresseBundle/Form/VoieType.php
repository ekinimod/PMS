<?php

namespace Domi\Bundle\AdresseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VoieType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libVoie')
            ->add('abreviationVoie')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Domi\Bundle\AdresseBundle\Entity\Voie'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'domi_bundle_adressebundle_voie';
    }
}
