<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once "./database/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET['page'])) {
        $page_number = 1;
    } else {
        $page_number = $_GET['page'];
    }

    $itemsPerPage = 6;
    $initial_limit = ($page_number - 1) * $itemsPerPage;
    $active = "ACTIVE";

    $sql = "SELECT * FROM `books` 
            LEFT JOIN authors ON books.author_id = authors.author_id
            LEFT JOIN categories ON books.category_id = categories.category_id
            WHERE books.book_status = 'ACTIVE'
            LIMIT $initial_limit, $itemsPerPage";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $allBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $allBooks = ["data" => $allBooks];

    header("Content-Type:application/json");
    $jsonobject = json_encode($allBooks);
    echo $jsonobject;
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if (strcasecmp($contentType, 'application/json') != 0) {
        throw new Exception('Content type must be: application/json');
    }

    $jsonContent = trim(file_get_contents("php://input"));

    $data = json_decode($jsonContent, true);

    if (!is_array($data)) {
        throw new Exception('Received content contained invalid JSON!');
    }

    if ($data['action'] == 'getBooks') {

        $page_number = $data['page'];
        $itemsPerPage = 100;
        $initial_limit = ($page_number - 1) * $itemsPerPage;
        $active = "ACTIVE";

        $sql = "SELECT * FROM `books` 
                LEFT JOIN authors ON books.author_id = authors.author_id
                LEFT JOIN categories ON books.category_id = categories.category_id
                WHERE books.book_status = 'ACTIVE'
                LIMIT $initial_limit, $itemsPerPage";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $books = ["data" => $books];

        $sqlTotalItems = "SELECT COUNT(book_id) FROM `books`
                        WHERE books.book_status = 'ACTIVE'";
        $stmtTotalItems = $pdo->prepare($sqlTotalItems);
        $stmtTotalItems->execute();
        $totalItems = $stmtTotalItems->fetchAll(PDO::FETCH_ASSOC);

        $newItems = [];
        foreach ($totalItems as $item) {
            $totalItems = array_merge($newItems, $item);
        };

        $count = "COUNT(book_id)";
        $totalItems['Total_items'] = $totalItems[$count];
        unset($totalItems[$count]);

        $itemsPerPage = ["Items_per_page" => $itemsPerPage];
        $page_number = ["Page" => $page_number];
        $totalPages = ceil($totalItems['Total_items'] / $itemsPerPage["Items_per_page"]);
        $totalPages = ["Total_pages" => $totalPages];

        $data = array_merge($page_number, $itemsPerPage, $totalItems, $totalPages, $books);

        header("Content-Type:application/json");
        $jsonobject = json_encode($data);
        echo $jsonobject;
    } elseif ($data['action'] == 'getBook') {

        $book_id = $data["book_id"];
        $sql = "SELECT * FROM `books` 
        LEFT JOIN authors ON books.author_id = authors.author_id
        LEFT JOIN categories ON books.category_id = categories.category_id
        WHERE books.book_id = '$book_id'";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $allBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $allBooks = ["data" => $allBooks];

        header("Content-Type:application/json");
        $jsonobject = json_encode($allBooks);
        echo $jsonobject;
    } elseif ($data['action'] == 'getComments') {

        $book_id = $data["book_id"];
        $user_id = $data["user_id"];
        
        $sqlComments = "SELECT * FROM `comments` 
        LEFT JOIN books ON comments.book_id = books.book_id
        LEFT JOIN users ON comments.user_id = users.user_id
        WHERE books.book_id = '$book_id' AND comments.comment_status = '1'";

        $stmtComments = $pdo->prepare($sqlComments);
        $stmtComments->execute();
        $comments = $stmtComments->fetchAll(PDO::FETCH_ASSOC);
        
        $comments = ["data" => $comments];

        header("Content-Type:application/json");
        $jsonobject = json_encode($comments);
        echo $jsonobject;
    } elseif ($data['action'] == 'getPendingComment') {

       
        $book_id = $data["book_id"];
        $user_id = $data["user_id"];

        $sql = "SELECT * FROM comments
        LEFT JOIN books ON comments.book_id = books.book_id
        LEFT JOIN users ON comments.user_id = users.user_id
        WHERE books.book_id = $book_id AND comments.user_id = $user_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$result) {
            $message = ["comment_status" => "none"];
            $data = ["data" => $message];

            header("Content-Type:application/json");
            $jsonobject = json_encode($data);
            echo $jsonobject;
        } else {

        $sqlPendingComment = "SELECT * FROM comments
        LEFT JOIN books ON comments.book_id = books.book_id
        LEFT JOIN users ON comments.user_id = users.user_id
        WHERE books.book_id = $book_id AND comments.user_id = $user_id AND comments.comment_status = 1";
        
        $stmtPendingComment = $pdo->prepare($sqlPendingComment);
        $stmtPendingComment->execute();
        $user_comment = $stmtPendingComment->fetch(PDO::FETCH_ASSOC);
        if ($user_comment) {
            $message = ["comment_status" => 1];
            $messageData = ["data" => $message];

            header("Content-Type:application/json");
            $jsonobject = json_encode($messageData);
            echo $jsonobject;
        }

        $sqlPendingComment = "SELECT * FROM `comments` 
        LEFT JOIN books ON comments.book_id = books.book_id
        LEFT JOIN users ON comments.user_id = users.user_id
        WHERE books.book_id = '$book_id' AND comments.user_id = $user_id AND comments.comment_status = 2";
        
        $stmtPendingComment = $pdo->prepare($sqlPendingComment);
        $stmtPendingComment->execute();
        $user_comment = $stmtPendingComment->fetch(PDO::FETCH_ASSOC);
        if ($user_comment) {
            $message = ["comment_status" => 2];

            header("Content-Type:application/json");
            $jsonobject = json_encode($message);
            echo $jsonobject;
        }

        $sqlPendingComment = "SELECT * FROM `comments` 
        LEFT JOIN books ON comments.book_id = books.book_id
        LEFT JOIN users ON comments.user_id = users.user_id
        WHERE books.book_id = '$book_id' AND comments.user_id = $user_id AND comments.comment_status = 3";
        
        $stmtPendingComment = $pdo->prepare($sqlPendingComment);
        $stmtPendingComment->execute();
        $user_comment = $stmtPendingComment->fetch(PDO::FETCH_ASSOC);
        if ($user_comment) {
            $user_comment = ["data" => $user_comment];

            header("Content-Type:application/json");
            $jsonobject = json_encode($user_comment);
            echo $jsonobject;
        } 
    }

    } elseif ($data['action'] == 'editUserComment') {

        $book_id = $data["book_id"];
        $user_id = $data["user_id"];
        $comment = $data["comment"];

        $sql = "UPDATE comments
        SET comment = :comment
        WHERE comments.user_id = :user_id AND comments.book_id = :book_id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'user_id' => $user_id,
                'book_id' => $book_id,
                'comment' => $comment,
            ]
        );

    } elseif ($data['action'] == 'deleteUserComment') {

        $user_id = $data["user_id"];

        $sql = "DELETE FROM comments WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'user_id' => $data['user_id'],
            ]
        );

    } elseif ($data['action'] == 'submitComment') {

        $book_id = $data["book_id"];
        $user_id = $data["user_id"];
        $comment = $data["comment"];
        $comment_status = 3;

        $sql = "SELECT * FROM `comments` 
        WHERE comments.user_id = '$user_id' AND comments.book_id = $book_id AND comments.comment_status = '1'";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $user_comment = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user_comment) {
            $sql = "INSERT INTO `comments` (book_id, user_id, comment, comment_status) 
            VALUES (:book_id, :user_id, :comment, :comment_status)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    'book_id' => $book_id,
                    'user_id' => $user_id,
                    'comment' => $comment,
                    'comment_status' => $comment_status,
                ]
            );

            $message = ["Comment is sent to our admins for approval."];

            header("Content-Type:application/json");
            $jsonobject = json_encode($message);
            echo $jsonobject;
        }
    } elseif ($data['action'] == 'getNotes') {

        $book_id = $data["book_id"];
        $user_id = $data["user_id"];
        
        $sqlNotes = "SELECT * FROM `notes` 
        LEFT JOIN books ON notes.book_id = books.book_id
        LEFT JOIN users ON notes.user_id = users.user_id
        WHERE books.book_id = $book_id AND notes.user_id = $user_id";

        $stmtNotes = $pdo->prepare($sqlNotes);
        $stmtNotes->execute();
        $notes = $stmtNotes->fetchAll(PDO::FETCH_ASSOC);
        
        $notes = ["data" => $notes];

        header("Content-Type:application/json");
        $jsonobject = json_encode($notes);
        echo $jsonobject;
    } elseif ($data['action'] == 'submitNote') {

        $book_id = $data["book_id"];
        $user_id = $data["user_id"];
        $note = $data["note"];

        $sqlUserNotes = "SELECT COUNT(note_id) FROM `notes`
                        WHERE notes.user_id = $user_id AND notes.book_id = $book_id";
        $stmtUserNotes = $pdo->prepare($sqlUserNotes);
        $stmtUserNotes->execute();
        $userNotes = $stmtUserNotes->fetchAll(PDO::FETCH_ASSOC);


        $newItems = [];
        foreach ($userNotes as $item) {
            $userNotes = array_merge($newItems, $item);
        };

        $count = "COUNT(note_id)";
        $userNotes['Total_items'] = $userNotes[$count];
        unset($userNotes[$count]);


        if(intval($userNotes['Total_items']) <= 5) {
            $sql = "INSERT INTO `notes` (book_id, user_id, note) 
            VALUES (:book_id, :user_id, :note)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    'book_id' => $book_id,
                    'user_id' => $user_id,
                    'note' => $note
                ]
            );

        } else {
            $message = ["notes" => "end"];
            header("Content-Type:application/json");
            $jsonobject = json_encode($message);
            echo $jsonobject;
        }


    }
    
}
