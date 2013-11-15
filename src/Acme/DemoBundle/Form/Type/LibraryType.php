<?php
namespace Acme\DemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

class LibraryType extends AbstractType
{
    /**
     * (non-PHPdoc)
     * @see \Symfony\Component\Form\AbstractType::buildForm()
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'medias',
            'afe_collection_upload',
            array(
                'label' => 'medias.label.name',
                'sortable' => false,
                'nameable' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'type' => 'sample_media',
                'options' => array(
                    'data_class' => '\Acme\DemoBundle\Entity\Media'
                )
            )
        );

    }

    /**
     * (non-PHPdoc)
     * @see \Symfony\Component\Form\AbstractType::setDefaultOptions()
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
       $resolver->setDefaults(array(
               'data_class' => 'Acme\DemoBundle\Entity\Library',
               'translation_domain' => 'messages',
       ));
    }

    /* (non-PHPdoc)
     * @see \Symfony\Component\Form\FormTypeInterface::getName()
     */
    public function getName()
    {
        return 'sample_library';
    }

}
