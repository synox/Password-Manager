# Architektur

# Implementation

# Betrieb

## Installation

[Composer](https://getcomposer.org/doc/00-intro.md#globally) (PHP Package management System) muss installiert sein. 

Git-Clone diese Projects machen, in web-Verzeichnis von apache kopieren . In der Console in das Verzeichnis wechseln, und wie folgt die Dependencies laden:

	composer install
	
Danach die Datenbank in Mysql erstellen. Die Dateien ``structure.sql``und ``demo_data.sql`` verwenden. 

Die Datenbank-Verbindung in ``app/Init.php`` eintragen. 

Apache starten und darauf zugreifen. z.B.: http://localhost/PM/public/


## Demo accounts
Mit folgenden Demo-Accounts kann getestet werden: 

	Username: demo 
	Password: demo


	Username: foo
	Password: foobar

