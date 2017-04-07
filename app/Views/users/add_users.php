<?php

$this->layout('layout', ['title' => 'Ajouter un utilisateur']);
$this->start('main_content');

$displayForm = true;
	

?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title>Ajouter un utilisateur</title>

<form method="post">
		<label for="firstname">Prénom</label>
		<input type="text" name="firstname" id="firstname">

		<br>
		<label for="lastname">Nom</label>
		<input type="text" name="lastname" id="lastname">

        <br>
		<label for="email">Adresse email</label>
		<input type="email" name="email" id="email">

		<br>
		<label for="phone">Téléphone</label>
		<input type="text" name="phone" id="phone">

		<br>
		<label for="password">Mot de passe</label>
		<input type="password" name="password" id="password">

		<br>
		<label for="role">Rôle</label>
		<input type="text" name="role" id="role">


		<br>
		<input type="submit" value="Ajouter l'utilisateur'">

	</form>

<?php
$this->stop('main_content');