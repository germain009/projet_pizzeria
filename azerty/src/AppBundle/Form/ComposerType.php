<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ComposerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {




        $builder
            ->add('nom')
            
            ->add('pate',EntityType::class,
                  ['class'=>'AppBundle:Pate',
                  'choice_label'=>'genre',
                  'placeholder'=>''

                  ])
            ->add('base',EntityType::class,
                  ['class'=>'AppBundle:Base',
                    'choice_label'=>'type',
                    'placeholder'=>''

        ])

            ->add('ingredients',EntityType::class,
                ['class'=>'AppBundle:Ingredients',
                    'choice_label'=>'nom',
                    'expanded'=>true,
                    'multiple'=>true

                ]);

    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Composer'
        ));
    }
}
