# Architektur

Das Projekt setzt stark auf die Wiederverwendung von Komponenten. Es wird zwischen den Komponenten **Model**, **View** (HTML Templates), **Controller** und **Persistence** getrennt. 



## Frameworks und Libraries
Es werden folgende Frameworks/Libraries eingesetzt, um bestehende Funktionen wiederzuverwenden: 

Name     											Technologie    Beschreibung		
-------     										-----------    ---------------
[Slim](http://www.slimframework.com/)				PHP   		    App-Framework/Router
[twig](http://twig.sensiolabs.org/) 				PHP 			HTML-Templates
[Aura.Sql](https://github.com/auraphp/Aura.Sql) 	PHP     		SQL-Zugriff
[valitron](https://github.com/vlucas/valitron) 		PHP 			Validierung 
[pwgen-php](https://github.com/roderik/pwgen-php) 	PHP 			Passwort-Generator 
[monolog](https://github.com/Seldaek/monolog) 		PHP 			Logging 
[composer](https://getcomposer.org/) 				PHP 			Class autoloading 
[bootstrap](http://getbootstrap.com/) 				HTML/CSS/JS 	Frontend framework
[jQuery](https://jquery.com/) 						JS 				JavaScript DOM library
[Font Awesome](http://fontawesome.io/) 				CSS 			Icons

Table:  Eingesetzte Frameworks.



\newpage

# Appendix A: Source Code {.unnumbered}
Der Sourcecode des gesamten Projekts kann abgerufen werden unter: [https://github.com/synox/Password-Manager](https://github.com/synox/Password-Manager)

# Appendix B: Installation {.unnumbered}

Requirements: 

* PHP, Version 5.3.0
* Apache 2
* [Composer](https://getcomposer.org/doc/00-intro.md#globally) (PHP Package Manager)

Installation: 
	
* Clone this repository
* Create a symlink from the ``htdocs`` to the ``public`` directory: `` ln -s /path/to/project/src/public /path/to/htdocs/password-manager`` 
* Download dependencies: 

	cd path/to/project/src
	composer install
* Create a database and import the files ``structure.sql`` and ``demo_data.sql``.  Change the database settings in ``app/Init.php``. 

* Start apache and test if it works. e.g. http://localhost/password-manager/

On errors, consult the logfiles. You can also configure slim to show errors in the browser: 

		$app = new \SlimController\Slim(array(
		(...)
	    'debug' => true




