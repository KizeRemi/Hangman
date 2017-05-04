<?php 

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

class Contact{
    /**
     * @Assert\NotBlank(
     *      message = "form.error.notblank"
     * )
     * @Assert\Email(
     *      message = "form.error.email"
     * )
     */
	private $sender;

    /**
     * @Assert\NotBlank(
     *      message = "form.error.notblank"
     * )
     */
	private $description;

    /**
     * @Assert\NotBlank(
     *      message = "form.error.notblank"
     * )
     * @Assert\Length(
     *		min = 10,
     *      max = 50,
     *		minMessage = "Le sujet ne peut pas contenir moins de {{ limit }} caractères",
     *      maxMessage = "Le sujet ne peut pas contenir plus de {{ limit }} caractères"
     * )
     */
	private $subject;

	public function setSender($sender){
		$this->sender = $sender;
	}

	public function getSender(){
		return $this->sender;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setSubject($subject){
		$this->subject = $subject;
	}

	public function getSubject(){
		return $this->subject;
	}	
}