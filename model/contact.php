<?php
class contact { // classe contact reprenant les informations du manager, formulaire, model//
  private $nom;
  private $prenom;
	private $raison_sociale;
  private $email;
  private $message;

  // Le constructeur //
  public function __construct($nom, $prenom, $raison_sociale, $email, $message){

      $this->setnom($nom);
      $this->setprenom($prenom);
			$this->setraison_sociale($raison_sociale);
      $this->setemail($email);
      $this->setmessage($message);

}
// Début des setteur  //
public function setnom($nom){
  if(empty($nom)){ // si la valeur saisie est vide afficher une erreur //
    trigger_error('la variable doit etre un caractere');
    return; // retourne le résultat //
  }
  $this->_nom = $nom;
}
public function setprenom($prenom){
  if(empty($prenom)){ // si la valeur saisie est vide afficher une erreur //
    trigger_error('la variable doit etre un caractere');
    return; // retourne le résultat //
  }
  $this->_prenom = $prenom;
}

public function setemail($email){
  if(empty($email)){ // si la valeur saisie est vide afficher une erreur //
    trigger_error('la variable doit etre un caractere');
    return; // retourne le résultat //
  }
  $this->_email = $email;
}

public function setmessage($message){
  if(empty($message)){ // si la valeur saisie est vide afficher une erreur //
    trigger_error('la variable doit etre un caractere');
    return; // retourne le résultat //
  }
  $this->_message = $message;
}
public function setraison_sociale($raison_sociale){
  if(empty($raison_sociale)){ // si la valeur saisie est vide afficher une erreur //
    trigger_error('la variable doit etre un caractere');
    return; // retourne le résultat //
  }
  $this->_raison_sociale = $raison_sociale;
}
// Fin des setteur  //

// Début des getteur//
public function getnom(){
  return $this->_nom;
}
public function getemail(){
  return $this->_email;
}
public function getprenom(){
  return $this->_prenom;
}
public function getmessage(){
  return $this->_message;
}
public function getraison_sociale(){
  return $this->_raison_sociale;
}
// Fin des getteur//
}

?>
