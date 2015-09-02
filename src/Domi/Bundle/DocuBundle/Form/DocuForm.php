<?php
/**
 * Created by PhpStorm.
 * User: S815385
 * Date: 22/07/2015
 * Time: 10:05
 */

namespace Domi\Bundle\DocuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DocuForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre', 'text', array(
            'max_length' => 50,
//            'required'=>true,
        ));
        $builder->add('soustitre', 'text', array(
            'max_length' => 50,
//            'required'=>false,
        ));
        $builder->add('note', 'integer', array(
            'max_length' => 5000,
//            'required'=>false,
        ));
        $builder->add('contenu', 'textarea', array(
            'max_length' => 5000,
//            'required'=>true,
        ));
        $builder->add('docPere', 'entity', array(
            'class' => 'Domi\Bundle\DocuBundle\Entity\Document',
            'property' => 'titre',
        ));
        $builder->add('docPrecedent', 'entity', array(
            'class' => 'Domi\Bundle\DocuBundle\Entity\Document',
            'property' => 'titre',
        ));
        $builder->add('docSuivant', 'entity', array(
            'class' => 'Domi\Bundle\DocuBundle\Entity\Document',
            'property' => 'titre',
        ));

        $builder->add('save', 'submit');
        $builder->add('reset', 'reset');
    }

    public function getName()
    {
        return 'titre';
    }

}
