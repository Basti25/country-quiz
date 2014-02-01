1. Wie ist dieses Programm entstanden

Dieses Programm gehört zu einem Semesterprojekt des Moduls Webprogrammierung der Fachhochschule Brandenburg in Brandenburg an der Havel.

2. Was macht dieses Programm

Dieses Programm stellt dem Nutzer Geografiefragen.
Dazu werden Fragen mit unterschiedlicher Schwierigkeit in eine Session gespeichert und nacheinander abgefragt.
Nach beenden der Fragerunde wird der Nutzer gebeten seinen Namen einzutragen um seinen Namen im Highscore zu speichern.
Danach beginnt der Ablauf von vorn.

Dieses Programm unterstützt das responsive Design und kann auf einem Tablet oder Smartphone gespielt werden.

3. Installationshinweise

Was wird benötigt:
    - Webserver mit mindestens PHP 4.4.7
    - Eine Datenbank

Im public-Ordner befindet sich eine application.ini Datei. Im folgenden werden die Einträge erklärt.

db_host = Name des Hostes wo die Datenbank liegt. localhost oder eine IP.
db_user = Username des Accounts der auf die Datenbank zugreifen kann
db_password = Passwort des Accounts das auf die Datenbank zugreifen kann
db_name = Name der Datenbank auf dem Datenbankserver

db_table_question = Name der Tabelle in der die Fragen gespeichert sind.

rootpath = Pfad auf dem Webserver zum Ordner der die Anwendung erhält.
bsp.: www/htdocs/user5/country-quiz
publicpath = Pfad zum public Verzeichnis der Anwendung
bsp.: www/htdocs/user5/country-quiz/public

game_rounds = Maximale Anzahl der Spielrunden. Wichtig!Muss ein vielfaches der Fragen pro Level sein!
questions_per_level = Anzahl der Fragen die von jedem Schwierigkeitsgrad genommen werden.
distanceScore = Grundpunktzahl für die Berechnung der Distanz der 2 Punkte.
highscore_list_entry = Maximale Anzahl der Einträge in der Highscoretabelle


Für die Datenbank werden 2 Tabellen benötigt.
Eine Fragentabelle und eine Highscoretabelle.
Die Highscoretabelle muss den Namen: "highscore", ohne Anführungszeichen, tragen.
Die Highscoretabelle besitzt folgende Spalten:
- id    -   Identifikationsnummer des Eintrages
- user  -   Name des Users
- score -   Punktestand des Users
- time  -   Zeitpunkt des Eintrages

Die Fragentabelle hat folgende Einträge:
- id        -   Identifikationsnummer des Eintrages
- level     -   Schwierigkeitsgrad der Frage
- question  -   Die Frage
- answer    -   Die Antwort zu der Frage
- X         -   X Koordinate der Antwort
- Y         -   Y Koordinate der Antwort
- is_live   -   Eintrag zum abfragen ob die Frage freigeschaltet wurde


4. Mitwirkende

- Diana Prüfert
- Sebastian Reinsch
- Patrick Walther

5. Zukünftige Programmierungsziele/Verbesserungen

- Alles was zur Session gehört als eigene Klasse auslagern
- Anpassung an der Maximalen Spielrundenzahl und der Fragen pro Level