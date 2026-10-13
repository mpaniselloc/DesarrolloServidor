<?php

//Archivo de la clase Usuario donde creamos los objetos de usuario con sus propiedades y metodos
class Usuario
{
  private string $nombre;
  private int $edad;
  private string $nick;
  private string $password;

  //Constructor de la clase objeto Usuario
  public function __construct(
    string $nombre,
    int $edad,
    string $nick,
    string $password
  ) {
    $this->nombre = $nombre;
    $this->edad = $edad;
    $this->nick = $nick;
    $this->password = $password;
  }


  public function getNombre(): string
  {
    return $this->nombre;
  }

  public function setNombre(string $nombre): void
  {
    $this->nombre = $nombre;
  }

  public function getEdad(): int
  {
    return $this->edad;
  }

  public function setEdad(int $edad): void
  {
    $this->edad = $edad;
  }

  public function getNick(): string
  {
    return $this->nick;
  }
  public function setNick(string $nick): void
  {
    $this->nick = $nick;
  }

  public function getPassword(): string
  {
    return $this->password;
  }
  public function setPassword(string $password): void
  {
    $this->password = $password;
  }

  //Creacion de la funcion para obtener la edad formateada, si es joven aparecera (Joven) y si es mayor aparecera (Senior)
  public function getEdadFormateada(): string
  {
    if ($this->edad >= 15 && $this->edad <= 20) {
      return $this->edad . "(Joven)";
    } elseif ($this->edad > 60) {
      return $this->edad . "(Senior)";
    }

    return (string)$this->edad;
  }


  // Creamos la funcion para obtener el emoji. Si la edad esta comprometida entre 15 y 20 nos aparecera el emoji, si no es asi, aparecera la edad que se ha introducido
  public function getEdadConEmoji(): string
  {
    if ($this->edad >= 15 && $this->edad <= 20) {
      return "😊";
    }
    return (string)$this->edad;
  }
}
