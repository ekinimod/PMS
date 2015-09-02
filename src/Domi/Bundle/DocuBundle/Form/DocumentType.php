<?php

namespace Domi\Bundle\DocuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocumentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('soustitre')
            ->add('contenu')
            ->add('note')
            ->add('docPere')
            ->add('docPrecedent')
            ->add('docSuivant')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Domi\Bundle\DocuBundle\Entity\Document'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'domi_bundle_docubundle_document';
    }
}
