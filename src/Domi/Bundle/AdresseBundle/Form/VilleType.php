<?php

namespace Domi\Bundle\AdresseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VilleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('departement')
            ->add('slug')
            ->add('nom')
            ->add('nomSimple')
            ->add('nomReel')
            ->add('nomSoundex')
            ->add('nomMetaphone')
            ->add('codePostal')
            ->add('commune')
            ->add('codeCommune')
            ->add('arrondissement')
            ->add('canton')
            ->add('amdi')
            ->add('population2010')
            ->add('population1999')
            ->add('population2012')
            ->add('densite2010')
            ->add('surface')
            ->add('longitudeDeg')
            ->add('latitudeDeg')
            ->add('longitudeGrd')
            ->add('latitudeGrd')
            ->add('longitudeDms')
            ->add('latitudeDms')
            ->add('zmin')
            ->add('zmax')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Domi\Bundle\AdresseBundle\Entity\Ville'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'domi_bundle_adressebundle_ville';
    }
}
