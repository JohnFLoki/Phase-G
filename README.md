# Phase-G
Karteikartensystem basierend auf HTML, PHP und MySQL.
# Videos
Die Videos bekommst du nicht hier sondern bei der Quelle: https://gebaerdenlernen.de/index.php
# Funktion
Jede Vokabel hat in der Datenbank einen Eintrag der über die Eigenschaften Datum und Level verfügt.
Man bekommt nur Vokabel abgefragt, wo der Datum-Eintrag vor dem heutigen Tag liegt.
Sollte eine Vokabel richtig beantwortet werden, wir das Level +1 gesetzt (außer bei Level 7 da bleibt es dabei) und das Datum wird um den Wert des Levels erhöht (siehe unten).
Wenn sie nicht richtig beantwortet wird sinkt das Level um 1 (außer bei Level 0).
Da alle Vokabeln auf Level 0 anfangen, wir im Eingabefeld schon die richtige Antwort gezeigt, damit man die Vokabel lernen kann.
Insgesamt sind es ca. 3694 Wörter also hab ich nicht jedes Wort auf seine Richtigkeit überprüft. Folglich entstehen Fehler wie das nicht laden eines Video-Links oder die falsche Angabe einer Lösung. In diesem Fall, eröffent bitte über die Schaltfläche hier ein Issue.
Zusätzlich kommt noch, dass Worte wie "einsetzen (in eine Formel - Mathematik)" oder "8:25 Uhr (Variante1)" einfach so einzutippen sind, wie sie angegeben werden, denn alle Antworten sind direkt aus dem Wörterbuch genommen und aufgrund der Menge nicht kontrollierbar.

Accounts können nur über MySQL erstellt werden und nicht über die Website, da Phase-G für den privaten Gebrauch gedacht ist. Auf Anfrage werde ich den Code aber gerne noch erweitern.
Außerdem muss für jede Account eine neue Datenbank erstellt werden, was vielleicht irgendwann behoben wird, jedoch generell eigentlich auch keine schlechte Lösung ist.
#Level-Abstände (frei wählbar durch bearbeiten der Datei)
Die Abstände sind unterschiedlich, da man die Vokabel besser kann je öfter man sie richtig hat und demnach muss man sie auch erstmal nicht beantworten.
# How to install
1. Erstelle einen Ordner für die Index-Seite
2. Erstelle kopiere hier die Dateien index.php und database.php rein.
3. Ersetze alle Variablen in den createacc.sql und createwords.sql Dateien nach deinen Wünschen.
4. Erstelle in MySQL Datenbanken mit den createacc.sql und createwords.sql Dateien und bearbeite die database.php Datei entsprechend deiner MySQL-login Daten.
5. Erstelle einen Unterordner video und ziehe hier alle Dateien rein, die du bei der Website unter Download -> Wörterbuch gesamt -> video findest.

Hier sind alle Hinweise auf gefundene fehlerhafte Daten und die Lösung des Problems:
---
# ToDo
1. Cooles CSS
2. Vokabeln fällig stats
3. (Datenbanken Verbesserungen s.o.)
4. (Accountsystem Verbesserungen s.o.)
5. (Docker)
# Copyright
Alle Inhalte dieser Repository stehen unter einer Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 3.0 Deutschland Lizenz (https://creativecommons.org/licenses/by-nc-sa/3.0/de/) und die Daten der Vokabeln sind von der Website https://gebaerdenlernen.de/index.php von Henrike Maria Bartsch welche auch unter der Lizenz Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 3.0 Deutschland steht (Stand 25.10.2021).
