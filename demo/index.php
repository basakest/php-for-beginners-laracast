<?php

$books = [
    ['title' => 'Dark Matter', 'author' => 'Blake Crouch', 'read' => true],
    ['title' => 'The Martian', 'author' => 'Andy Weir', 'read' => false],
    ['title' => 'Ready Player One', 'author' => 'Ernest Cline', 'read' => true],
    ['title' => 'The Hobbit', 'author' => 'J.R.R. Tolkien', 'read' => false],
];

$filteredBooks = array_filter($books, function ($book) {
    return $book['read'] == false;
});

require 'index.view.php';
