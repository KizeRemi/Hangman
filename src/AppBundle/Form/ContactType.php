<?php 
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        $builder
        	->add('sender', EmailType::class,  array('label' => 'form.label.sender'))
        	->add('subject', TextType::class,  array(
        								'label' => 'form.label.subject',
        								'required'=> false	
        								))
            ->add('description', TextareaType::class,  array('label' => 'form.label.description'))
            ->add('send', SubmitType::class,  array(
        								'label' => 'form.label.send'
        								));
    }

}