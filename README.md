# Phase-G
Karteikartensystem für Gebärdensprache basierend auf HTML, PHP und MySQL.

# Funktion
Gebärde zu Text (GtT)
---
Jede Vokabel hat in der Datenbank einen Eintrag, der über die Eigenschaften Datum und Level verfügt.<br>
Man bekommt nur Vokabeln per Zufall abgefragt, wo der Datum-Eintrag vor dem heutigen Tag liegt.<br>
Sollte eine Vokabel richtig beantwortet werden, wir das Level +1 gesetzt (außer bei Level 7 da bleibt es dabei) und das Datum wird um den Wert des Levels erhöht (siehe unten).<br>
Wenn sie nicht richtig beantwortet wird sinkt das Level um 1 (außer bei Level 0).<br>
**Da alle Vokabeln auf Level 0 anfangen, wir im Eingabefeld schon die richtige Antwort gezeigt, damit man die Vokabel lernen kann.<br>**
Insgesamt sind es bei gebaerdenlernen.de ca. 3694 Wörter also hab ich nicht jedes Wort und jedes Video auf seine Richtigkeit überprüft. Folglich entstehen Fehler wie das nicht-laden eines Video-Links oder die falsche Angabe einer Lösung. In diesem Fall, eröffnet bitte über die Schaltfläche ein Issue (eine Fehlermeldung).<br>
Zusätzlich kommt noch, dass Worte wie "einsetzen (in eine Formel - Mathematik)" oder "8:25 Uhr (Variante1)" exakt so einzutippen sind, wie sie angegeben werden, denn alle Antworten sind direkt aus dem/den Wörterbuch/Wörterbüchern genommen und aufgrund der Menge nicht kontrollierbar.<br><br>


Text zu Gebärde (TtG)
---
Um diese Funktion zu aktivieren muss man in die Einstellungen seiner Account gehen (Zahnrad in der Sidebar). Dort befindet sich ein Regler der angibt wie häufig Text zu Gebärde abgefragt wird.<br>
Null steht für nie, 100 für immer.<br>
Da man am Anfang noch keine Gebärden kennt und man erst auf Level 2 weiß, ob man sich die Vokabel richtig gemerkt hat, wird TtG erst ab Level 2 mit in die zufällige Auswahl genommen. Eine Funktion die diese Beschränkung deaktiviert (z.B. für "Muttergebärder"), kommt noch.<br>
Es bietet sich an am Anfang den Regler hoch einzustellen, da immer die paar Vokabeln auf Level 2+ abgefragt werden (vom Zufall abhängig) und man dann dirket getestet wird. Später sollte man den Regler eher mittig einstellen, um auch noch die GtT Vokabeln auf ein hohes Level zu bekommen (aber keinen Stress das pendelt sich auch fast automatisch ein).<br><br>
Accounts können vorerst nur über MySQL erstellt werden und nicht über die Website, da Phase-G für den privaten Gebrauch gedacht ist. Der Code dazu ist aber in Vorbereitung.<br>
Außerdem muss für jede Account eine neue words_(Benutzername) Tabelle in phase_g_words erstellt werden, da ja jeder seinen eigenen Vortschritt haben will.


Level-Abstände (momentan frei wählbar durch bearbeiten der index.php Datei):
---
Die Abstände sind unterschiedlich, da man die Vokabel besser kann je öfter man sie richtig hat und demnach muss man sie auch erstmal nicht beantworten.<br><br>
Level 0: 0 Tage<br>
Level 1: 5 Tage<br>
Level 2: 20 Tage<br>
Level 3: 40 Tage<br>
Level 4: 80 Tage<br>
Level 5: 160 Tage<br>
Level 6: 320 Tage<br>
Level 7: 15 Monate<br>


# Videos
Die Videos bekommst du nicht hier sondern bei der Quelle: 
- Berliner Dialekt: https://gebaerdenlernen.de/index.php 3654 Wörter

  **Ordnername in video (siehe unten): berlin1**

# How to install
Vorraussetzungen: Funktionierende WebServer, PHP (getestet auf 7.3) und MySQL (inklusive Benutzer für database.php) Login-Daten.
1. Erstelle einen Ordner für die Index-Seite
2. Kopiere hier die Dateien admin.php, back.svg, database.php, index.php, settings.php, settings.svg und style.css rein
3. Ersetze alle Variablen (markiert mit ///) in den createacc.sql und database.php Dateien nach deinen Wünschen und deinen Vorgaben (Importieren auf eigenes Riskiko für bestehende Datenbanken).
4. Erstelle auf deinem Web Server eine MySQL Datenbanken mit der createacc.sql Datei und bearbeite die database.php Datei entsprechend deiner MySQL-login Daten.
5. Erstelle einen Unterordner video und ziehe hier alle Dateien rein, die du bei der Website findest (z.B. unter Download -> Wörterbuch gesamt -> video bei gebaerdenlernen.de).
6. Melde dich mit den Admin Daten an und erstelle Benutzer mit den zur Verfügung stehenden Wörterbüchern.
Hinweis: Um die Privatsspähre zu schützen sind alle Passwörter außer dem des Admins verschlüsselt. Das Passwort des Admins muss im Klartext in der Datenbank stehen. Wenn alle Nutzer über das Admin Panel erstellt werden, sollte es dahingehend nicht zu Problemen kommen.

Ordner-Struktur:
---
reset_dont_use.php nur hinzufügen wenn du weißt was du tust!<br>
📁phase-g<br>
 ┝📁video<br>
 │&nbsp;&nbsp;└📁Ordner für jedes Wörterbuch, was man haben möchte.<br>
 │&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└📝alle .mp4 Dateien aus der Quelle<br>
 ┝📝back.svg<br>
 ┝📝database.php<br>
 ┝📝index.php<br>
 ┝📝settings.php<br>
 ┝📝settings.svg<br>
 └📝style.css<br>

Hier sind alle Hinweise auf gefundene fehlerhafte Daten:
---
Bitte unter den Issues gucken!<br>
Updates werden mit einem Update script gepostet.

# ToDo
- Specials aus berlin1
- Mobile play speed
- Weitere Wörterbücher
- Englische Version
- (Installer)
- (Docker)

# Dialekte
Da es in der Deutschen Gebärden Sprache mehrere Dialekte gibt, ist diese Webanwendung aufgebaut auf Wörterbüchern die zur Verfügung stehen.
Dies ist im Moment nur das von gebaerdenlernen.de, welches nur den Berliner Dialekt abbildet.
Sobald ich ein anderes Wörterbuch finde, welches Open Source und kostenlos ist, werde ich das gerne auch implementieren.
Es wäre gut wenn das Wörterbuch eine Struktur hat, wo man den Namen der Datei und die zugehörige Vokabel einfach implementieren kannn (z.B. katze.mp4 ist Katze).
Hierzu kann man gerne ein Issue erstellen.
# Copyright
Alle Inhalte dieser Repository stehen unter einer Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 3.0 Deutschland Lizenz (https://creativecommons.org/licenses/by-nc-sa/3.0/de/)

Wörterbücher
---
Vokabelliste Berliner Dialekt(berlin1)/demo1 ist von der Website https://gebaerdenlernen.de/index.php von Henrike Maria Bartsch welche auch unter der Lizenz Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 3.0 Deutschland steht (Stand 25.10.2021).

---
# Notes
Update script: UPDATE words_name SET link = CONCAT('berlin1/', link)
