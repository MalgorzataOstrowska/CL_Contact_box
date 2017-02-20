<?php

namespace ContactBoxBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', null, ['label' => 'First name'])
            ->add('lastName', null, ['label' => 'Last name'])
            ->add('description', null, ['label' => 'Description'])
            ->add('address', EntityType::class,
                ['class' => 'ContactBoxBundle:Address',
                    'choice_label' => 'id'])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ContactBoxBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'contactboxbundle_contact';
    }


}
