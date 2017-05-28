<?php

date_default_timezone_set("Africa/Nairobi");
require_once WPATH . "modules/classes/System_Administration.php";
require_once WPATH . "modules/classes/Users.php";

class Books extends Database {

    public function execute() {
        if ($_POST['action'] == "filter_books") {
            return $this->getAllFilteredBooks();
        } else if ($_POST['action'] == "search") {
            return $this->getAllFilteredBooks();
        } 
    }
    
    public function fetchBookDetails($code) {
        $sql = "SELECT * FROM books WHERE id=:code";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindParam("code", $code);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $info[0];
    }
     
    public function getAllSearchedBooks($search_by, $search_value) {
        
        if ($search_by === "none") {
            $sql = "SELECT * FROM books WHERE title LIKE '%{$search_value}%' "
                . "OR description LIKE '%{$search_value}%' "
                . "OR author LIKE '%{$search_value}%' "
                . "OR publisher LIKE '%{$search_value}%' "
                . "OR publication_year LIKE '%{$search_value}%' "
                . "OR isbn_number LIKE '%{$search_value}%' "
                . "OR type_id LIKE '%{$search_value}%' "
                . "OR level_id LIKE '%{$search_value}%' "
                . "OR price LIKE '%{$search_value}%' "
                . " ORDER BY id ASC";
        } else if ($search_by === "all") {
             $sql = "SELECT * FROM books WHERE title LIKE '%{$search_value}%' "
                . "OR description LIKE '%{$search_value}%' "
                . "OR author LIKE '%{$search_value}%' "
                . "OR publisher LIKE '%{$search_value}%' "
                . "OR publication_year LIKE '%{$search_value}%' "
                . "OR isbn_number LIKE '%{$search_value}%' "
                . "OR type_id LIKE '%{$search_value}%' "
                . "OR level_id LIKE '%{$search_value}%' "
                . "OR price LIKE '%{$search_value}%' "
                . " ORDER BY id ASC";
        } else if ($search_by === "publishers") {
             $sql = "SELECT * FROM books WHERE publisher LIKE '%{$search_value}%' ORDER BY id ASC";
        } else if ($search_by === "book_titles") {
             $sql = "SELECT * FROM books WHERE title LIKE '%{$search_value}%' ORDER BY id ASC";
        } else if ($search_by === "publication_years") {
             $sql = "SELECT * FROM books WHERE publication_year LIKE '%{$search_value}%' ORDER BY id ASC";
        } else if ($search_by === "isbn_numbers") {
             $sql = "SELECT * FROM books WHERE isbn_number LIKE '%{$search_value}%' ORDER BY id ASC";
        } else if ($search_by === "book_types") {
             $sql = "SELECT * FROM books WHERE type_id LIKE '%{$search_value}%' ORDER BY id ASC";
        } else if ($search_by === "book_levels") {
            $sql = "SELECT * FROM books WHERE level_id LIKE '%{$search_value}%' ORDER BY id ASC";
        }
        
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_searched_records'] = true;
        } else {
            $_SESSION['yes_searched_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "title" => $data['title'], "description" => $data['description'], "publisher" => $data['publisher'], "type_id" => $data['type_id'], "level_id" => $data['level_id'], "price" => $data['price'], "cover_photo" => $data['cover_photo'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return $values2;
//            return json_encode($values2);
        }
    }
     
    private function getAllFilteredBooks() {
        $sql = "SELECT * FROM books WHERE publisher=:publisher AND level_id=:level_id ORDER BY id ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindParam("publisher", $_POST['publisher']);
        $stmt->bindParam("level_id", $_POST['book_level']);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "title" => $data['title'], "description" => $data['description'], "publisher" => $data['publisher'], "type_id" => $data['type_id'], "level_id" => $data['level_id'], "price" => $data['price'], "cover_photo" => $data['cover_photo'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    public function getBookLevelRefTypeId($level) {
        $sql = "SELECT id, status FROM book_levels WHERE name=:level";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("level", $level);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data = $data[0];
        return strtoupper($data['id']);
    }

    public function getBookTypeRefTypeId($type) {
        $sql = "SELECT id, status FROM book_types WHERE name=:type";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("type", $type);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data = $data[0];
        return strtoupper($data['id']);
    }

    public function getAllLevelBooks($level) {

        $level_code = $this->getBookLevelRefTypeId($level);

        $sql = "SELECT * FROM books WHERE level_id=:level ORDER BY id ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("level", $level_code);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            if ($level === "ECD") {
                $_SESSION['no_ecd_records'] = true;
            } else if ($level === "PRIMARY LEVEL") {
                $_SESSION['no_primary_records'] = true;
            } else if ($level === "SECONDARY LEVEL") {
                $_SESSION['no_secondary_records'] = true;
            } else if ($level === "ADULT READER") {
                $_SESSION['no_adult_records'] = true;
            }
        } else {
            if ($level === "ECD") {
                $_SESSION['yes_ecd_records'] = true;
            } else if ($level === "PRIMARY LEVEL") {
                $_SESSION['yes_primary_records'] = true;
            } else if ($level === "SECONDARY LEVEL") {
                $_SESSION['yes_secondary_records'] = true;
            } else if ($level === "ADULT READER") {
                $_SESSION['yes_adult_records'] = true;
            }
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "title" => $data['title'], "description" => $data['description'], "publisher" => $data['publisher'], "type_id" => $data['type_id'], "level_id" => $data['level_id'], "price" => $data['price'], "cover_photo" => $data['cover_photo'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getAllTypeBooks($type) {
        
        $type_code = $this->getBookTypeRefTypeId($type);

        $sql = "SELECT * FROM books WHERE type_id=:type ORDER BY id ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("type", $type_code);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            if ($type === "ENGLISH READER") {
                $_SESSION['no_english_records'] = true;
            } else if ($type === "KISWAHILI READER") {
                $_SESSION['no_kiswahili_records'] = true;
            } else if ($type === "POETRY") {
                $_SESSION['no_poetry_records'] = true;
            } else if ($type === "LIFESTYLE") {
                $_SESSION['no_lifestyle_records'] = true;
            }
        } else {
            if ($type === "ENGLISH READER") {
                $_SESSION['yes_english_records'] = true;
            } else if ($type === "KISWAHILI READER") {
                $_SESSION['yes_kiswahili_records'] = true;
            } else if ($type === "POETRY") {
                $_SESSION['yes_poetry_records'] = true;
            } else if ($type === "LIFESTYLE") {
                $_SESSION['yes_lifestyle_records'] = true;
            }
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "title" => $data['title'], "description" => $data['description'], "publisher" => $data['publisher'], "type_id" => $data['type_id'], "level_id" => $data['level_id'], "price" => $data['price'], "cover_photo" => $data['cover_photo'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getAllBooks() {
        $sql = "SELECT * FROM books ORDER BY id ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "title" => $data['title'], "description" => $data['description'], "publisher" => $data['publisher'], "type_id" => $data['type_id'], "level_id" => $data['level_id'], "price" => $data['price'], "cover_photo" => $data['cover_photo'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function fetchDocumentTypeDetails($code) {
        $sql = "SELECT * FROM document_types WHERE id=:code";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindParam("code", $code);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $info[0];
    }

    public function getAllDocumentTypes() {
        $sql = "SELECT * FROM document_types ORDER BY id ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "category" => $data['category'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

}
