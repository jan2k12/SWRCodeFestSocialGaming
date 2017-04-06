<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 16.11.16
 * Time: 22:01
 */

namespace SocialGamingBundle\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use SocialGamingBundle\Entity\User;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username',TextType::class)
            ->add('email',EmailType::class,array(

            ))
            ->add('plainPassword',RepeatedType::class,array(
                'type'=>PasswordType::class,
                'first_options'=>array('label'=>'Password'),
                'second_options'=>array('label'=>'Repeat Password')
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class'=>'SocialGamingBundle\Entity\GameUser'));
    }


}