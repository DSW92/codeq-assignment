# codeq-assignment
## codeq recruitment task

ZADANIE REKRUTACYJNE

I PRZYGOTOWANIE PROJEKTU - INSTRUKCJA:

1. Przygotuj lokalne repozytorium GIT.
2. Przygotuj czystą instalację WordPress
3. Zainstaluj wtyczkę ACF PRO z katalogu.
4. Stwórz motyw potomny do najnowszego domyślnego szablonu WordPress.
5. Na końcu prac wykonaj kopię bazy danych i dodaj do repozytorium GIT, wyślij wszysktie branche do repozytorium zdalnego (gitlab, github lub bitbucket).
6. Prześlij informacje o repozytorium na e-mail praca@codeq.pl
7. W treści e-mail podaj login i hasło administratora do panelu /wp-admin.

Założenie 1 
Każde zadanie wykonuj na oddzielnym branchu, po zakończeniu każdego zadania zatwierdź zmiany i wyślij do repozytorium zdalnego, 
następnie utwórz nowy branch do kolejnego zadania z brancha master. Powtarzaj algorytm do zakończenia realizacji wszsytkich zadań. 
Po skończeniu wszystkich zadań zmerguj poszeczególne branche do brancha master, rozwiąż ewentualne konflikty i wyślij do repozytorium zdalnego.

Założenie 2
Wszystkie pola dodawane przy użyciu wtyczki ACF powinny być zapisane jako pliki JSON - https://www.advancedcustomfields.com/resources/local-json/. 
Po załadowaniu plików szablonu i wtyczek i stworzeniu odpowiednich treści pola powinny od razu pojawić się w panelu administracyjnym.

Założenie 3
Nigdzie nie używaj języka polskiego, cały kod włącznie z komentarzami i nazwami commitów powinien być napisany w języku angielskim.

Założenie 4
Podaj orientacyjny czas wykonywania zadań.


II ZADANIA:

1A. Skonwertuj widok Figmy (https://figma.com/proto/7b0IruVgkSEF4khQWtEYdp/project?node-id=0%3A2&scaling=min-zoom&page-id=0%3A1) do HTML, na dedykowanym template page, staraj się używać najnowszych technologii, ale pamiętaj o poprawnym wyświetlaniu w różnych przeglądarkach.
Widok responsive wykonaj wg własnego uznania.

2A. Jeśli wykonałeś zadanie 1, zmerguj branch do brancha master, utwórz z niego nowy branch i rozwiń podstronę o dodatkową sekcję z pracownikami (listą pracowników). 
Lista powinna wyświetlać zdjęcie (ACF - pole typu image) oraz imię (ACF - pole typu text) pod zdjeciem i powinna być w całości załadowana AJAXem dopiero po wyświetleniu strony - np. po kliknięciu przycisku "pokaż pracowników". Wygląd CSS nie jest tu istotny.

## Installation

1. clone repository
2. Setup WP database
3. npm install - to install necessary dependencies
4. npm run dev - run development instance (including webpack)
