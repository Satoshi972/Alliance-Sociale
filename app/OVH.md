# Manip a faire pour la mise en ligne de W sous OVH

*** Version de PHP ***
Les dépendences telles que rspect validation ne passent pas sur PHP 7, dans le ovhconfig, mettre la version a 5.6

*** Les dossiers ***
En local on utilise notre dossier alliance sociale, en ligne on mettre le contenu du dossier uniquement (le dossier alliance social sera le dossier d base de OVH). Le dossier public devra etre renommer www

*** La bdd ***
On utilisera les id que ovh nous auras donné pour la config de W pour acceder a la bdd