<?php
	class User{
		private $id;
		private $username;
		private $email;
		private $pwd;
		private $type;
		function __construct($id, $username, $email, $pwd, $type){
			$this->id=$id;
			$this->username=$username;
			$this->email=$email;
			$this->pwd=$pwd;
			$this->type=$type;
		}
		function getid(){
			return $this->id;
		}
		function getUsername(){
			return $this->username;
		}
		function getEmail(){
			return $this->email;
		}
		function getpwd(){
			return $this->pwd;
		}
		function getType(){
			return $this->type;
		}
		function setid(int $id){
			$this->id=$id;
		}
		function setUsername(string $username){
			$this->username=$username;
		}
		function setEmail(string $email){
			$this->email=$email;
		}
		function setpwd(string $pwd){
			$this->pwd=$pwd;
		}
		function setType(string $type){
			$this->type=$type;
		}
		
	}


?>