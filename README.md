# Phase-G
Karteikartensystem basierend auf HTML, PHP und MySQL.
# Videos
Die Videos bekommst du nicht hier sondern bei der Quelle: https://gebaerdenlernen.de/index.php
# Funktion
Jede Vokabel hat in der Datenbank einen Eintrag der über die Eigenschaften Datum und Level verfügt.<br>
Man bekommt nur Vokabeln per Zufall abgefragt, wo der Datum-Eintrag vor dem heutigen Tag liegt.<br>
Sollte eine Vokabel richtig beantwortet werden, wir das Level +1 gesetzt (außer bei Level 7 da bleibt es dabei) und das Datum wird um den Wert des Levels erhöht (siehe unten).<br>
Wenn sie nicht richtig beantwortet wird sinkt das Level um 1 (außer bei Level 0).<br>
Da alle Vokabeln auf Level 0 anfangen, wir im Eingabefeld schon die richtige Antwort gezeigt, damit man die Vokabel lernen kann.<br>
Insgesamt sind es ca. 3694 Wörter also hab ich nicht jedes Wort auf seine Richtigkeit überprüft. Folglich entstehen Fehler wie das nicht laden eines Video-Links oder die falsche Angabe einer Lösung. In diesem Fall, eröffent bitte über die Schaltfläche hier ein Issue.<br>
Zusätzlich kommt noch, dass Worte wie "einsetzen (in eine Formel - Mathematik)" oder "8:25 Uhr (Variante1)" einfach so einzutippen sind, wie sie angegeben werden, denn alle Antworten sind direkt aus dem Wörterbuch genommen und aufgrund der Menge nicht kontrollierbar.<br><br>
Accounts können nur über MySQL erstellt werden und nicht über die Website, da Phase-G für den privaten Gebrauch gedacht ist. Auf Anfrage werde ich den Code aber gerne noch erweitern.<br>
Außerdem muss für jede Account eine neue Datenbank erstellt werden, was vielleicht irgendwann behoben wird, jedoch generell eigentlich auch keine schlechte Lösung ist.



Level-Abstände (frei wählbar durch bearbeiten der Datei):
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
# How to install
Vorraussetzungen: Funktionierende WebServer, PHP (getestet auf 7.3) und MySQL (inklusive Benutzer für database.php) Instanzen.
1. Erstelle einen Ordner für die Index-Seite
2. Kopiere hier die Dateien index.php, database.php und style.css rein.
3. Ersetze alle Variablen (markiert mit ///) in den createacc.sql, createwords.sql und database.php Dateien nach deinen Wünschen (Importieren auf eigenes Riskiko).
4. Erstelle in MySQL Datenbanken mit den createacc.sql und createwords.sql Dateien und bearbeite die database.php Datei entsprechend deiner MySQL-login Daten.
5. Erstelle einen Unterordner video und ziehe hier alle Dateien rein, die du bei der Website unter Download -> Wörterbuch gesamt -> video findest.

Struktur:
---
phase-g<br>
 ┝ video<br>
  |   └ alle .mp4 Dateien aus der Zip<br>
 ┝ database.php<br>
 ┝ index.php<br>
└ style.css<br>

Hier sind alle Hinweise auf gefundene fehlerhafte Daten:
---
# ToDo
1. Login mit Cookies
2. (Hashed Passwords)
3. (Demo page)
4. (Code verschönern)
5. (Datenbanken Verbesserungen s.o.)
6. (Accountsystem Verbesserungen s.o.)
7. (Docker)
8. (Acccount Playback Speed https://www.w3schools.com/Tags/tryit.asp?filename=tryhtml5_av_prop_playbackrate)
# Copyright
Alle Inhalte dieser Repository stehen unter einer Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 3.0 Deutschland Lizenz (https://creativecommons.org/licenses/by-nc-sa/3.0/de/) und die Daten der Vokabeln sind von der Website https://gebaerdenlernen.de/index.php von Henrike Maria Bartsch welche auch unter der Lizenz Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 3.0 Deutschland steht (Stand 25.10.2021).
