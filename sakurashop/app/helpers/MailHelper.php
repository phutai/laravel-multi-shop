<?php

class MailHelper{
	private $email;
	private $content;
	private $subject;

	function __construct($content, $subject)
	{
		$this->content = $content;
		$this->subject = $subject;
	}


	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * @return mixed
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @param mixed $content
	 */
	public function setContent($content)
	{
		$this->content = $content;
	}

	/**
	 * @return mixed
	 */
	public function getSubject()
	{
		return $this->subject;
	}

	/**
	 * @param mixed $subject
	 */
	public function setSubject($subject)
	{
		$this->subject = $subject;
	}

	public function sendEmail(){
		Mail::send('admin.email.welcome', array('contents'=>$this->getContent(), 'email' => $this->getEmail()),
			function($message)
			{
				$message->to($this->getEmail(), $this->getEmail())->subject($this->getSubject());
			});
	}
	
}