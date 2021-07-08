<?php
class contact { // classe contact reprenant les informations du manager, formulaire, model//
  private $nom;
  private $email;
  private $message;

  // Le constructeur //
  public function __construct($nom, $email, $message){

      $this->setnom($nom);
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

// Fin des setteur  //

// Début des getteur//
public function getnom(){
  return $this->_nom;
}
public function getemail(){
  return $this->_email;
}
public function getmessage(){
  return $this->_message;
}

// Fin des getteur//
}

?>
