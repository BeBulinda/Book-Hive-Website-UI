<?php

date_default_timezone_set("Africa/Nairobi");

class System_Administration extends Database {

    public function execute() {
        if ($_POST['action'] == "add_system_component") {
            return $this->addSystemComponent();
        } else if ($_POST['action'] == "edit_system_component") {
            return $this->editSystemComponent();
        } else if ($_POST['action'] == "add_system_privilege") {
            return $this->addSystemPrivilege();
        } else if ($_POST['action'] == "edit_system_privilege") {
            return $this->editSystemPrivilege();
        } else if ($_POST['action'] == "add_status_code") {
            return $this->addStatusCode();
        } else if ($_POST['action'] == "edit_status_code") {
            return $this->editStatusCode();
        } else if ($_POST['action'] == "add_sub_county") {
            return $this->addSubCounty();
        } else if ($_POST['action'] == "edit_sub_county") {
            return $this->editSubCounty();
        } else if ($_POST['action'] == "add_role") {
            return $this->addRole();
        } else if ($_POST['action'] == "edit_role") {
            return $this->editRole();
        } else if ($_POST['action'] == "add_county") {
            return $this->addCounty();
        } else if ($_POST['action'] == "edit_county") {
            return $this->editCounty();
        } else if ($_POST['action'] == "add_location") {
            return $this->addLocation();
        } else if ($_POST['action'] == "edit_location") {
            return $this->editLocation();
        } else if ($_POST['action'] == "add_payment_option") {
            return $this->addPaymentOption();
        } else if ($_POST['action'] == "edit_payment_option") {
            return $this->editPaymentOption();
        } else if ($_POST['action'] == "add_privilege_to_role") {
            return $this->addPrivilegeToRole();
        } else if ($_POST['action'] == "add_book_type") {
            return $this->addBookType();
        } else if ($_POST['action'] == "edit_book__type") {
            return $this->editBookType();
        } else if ($_POST['action'] == "add_book_level") {
            return $this->addBookLevel();
        } else if ($_POST['action'] == "edit_book_level") {
            return $this->editBookLevel();
        } else if ($_POST['action'] == "add_user_type") {
            return $this->addUserType();
        } else if ($_POST['action'] == "edit_user_type") {
            return $this->editUserType();
        } else if ($_POST['action'] == "add_institution") {
            return $this->addInstitution();
        } else if ($_POST['action'] == "edit_institution") {
            return $this->editInstitution();
        } else if ($_POST['action'] == "add_collection_point") {
            return $this->addCollectionPoint();
        } else if ($_POST['action'] == "edit_collection_point") {
            return $this->editCollectionPoint();
        } else if ($_POST['action'] == "add_email_message") {
            return $this->addEmailMessage();
        }
    }

    private function addPaymentOption() {
        $sql = "INSERT INTO payment_options (name, createdby, lastmodifiedby)"
                . " VALUES (:name, :createdby, :lastmodifiedby)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("createdby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']); //  echo $_SESSION['userid']);
        $stmt->execute();
        return true;
    }

    private function addRole() {
        $sql = "INSERT INTO roles (name, description, createdby, lastmodifiedby)"
                . " VALUES (:name, :description, :createdby, :lastmodifiedby)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("description", strtoupper($_POST['description']));
        $stmt->bindValue("createdby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']); //  echo $_SESSION['userid']);
        $stmt->execute();
        return true;
    }

    private function addStatusCode() {
        $sql = "INSERT INTO status_codes (status_code, description, createdby, lastmodifiedby)"
                . " VALUES (:status_code, :description, :createdby, :lastmodifiedby)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("status_code", strtoupper($_POST['status_code']));
        $stmt->bindValue("description", strtoupper($_POST['description']));
        $stmt->bindValue("createdby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']); //  echo $_SESSION['userid']);
        $stmt->execute();
        return true;
    }

    private function addUserType() {
        $sql = "INSERT INTO user_types (name, is_staff, createdby, lastmodifiedby)"
                . " VALUES (:name, :is_staff, :createdby, :lastmodifiedby)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("is_staff", strtoupper($_POST['is_staff']));
        $stmt->bindValue("createdby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']); //  echo $_SESSION['userid']);
        $stmt->execute();
        return true;
    }

    private function addBookLevel() {
        $sql = "INSERT INTO book_levels (name, createdby, lastmodifiedby)"
                . " VALUES (:name, :createdby, :lastmodifiedby)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("createdby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']); //  echo $_SESSION['userid']);
        $stmt->execute();
        return true;
    }

    private function addBookType() {
        $sql = "INSERT INTO book_types (name, createdby, lastmodifiedby)"
                . " VALUES (:name, :createdby, :lastmodifiedby)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("createdby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']); //  echo $_SESSION['userid']);
        $stmt->execute();
        return true;
    }

    private function addSystemComponent() {
        $sql = "INSERT INTO system_components (name, acronym, createdby, lastmodifiedby)"
                . " VALUES (:name, :acronym, :createdby, :lastmodifiedby)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("acronym", strtoupper($_POST['acronym']));
        $stmt->bindValue("createdby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']); //  echo $_SESSION['userid']);
        $stmt->execute();
        return true;
    }

    private function addSystemPrivilege() {
        $sql = "INSERT INTO system_privileges (name, component, createdby, lastmodifiedby)"
                . " VALUES (:name, :component, :createdby, :lastmodifiedby)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("component", $_POST['component']);
        $stmt->bindValue("createdby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']); //  echo $_SESSION['userid']);
        $stmt->execute();
        return true;
    }

    private function addCounty() {
        $sql = "INSERT INTO counties (name, createdby, lastmodifiedby)"
                . " VALUES (:name, :createdby, :lastmodifiedby)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("createdby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']); //  echo $_SESSION['userid']);
        $stmt->execute();
        return true;
    }

    private function addSubCounty() {
        $sql = "INSERT INTO sub_counties (name, county_id, createdby, lastmodifiedby)"
                . " VALUES (:name, :county_id, :createdby, :lastmodifiedby)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("county_id", strtoupper($_POST['county_id']));
        $stmt->bindValue("createdby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']); //  echo $_SESSION['userid']);
        $stmt->execute();
        return true;
    }

    private function addLocation() {
        $sql = "INSERT INTO locations (name, sub_county_id, createdby, lastmodifiedby)"
                . " VALUES (:name, :sub_county_id, :createdby, :lastmodifiedby)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("sub_county_id", strtoupper($_POST['sub_county_id']));
        $stmt->bindValue("createdby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']); //  echo $_SESSION['userid']);
        $stmt->execute();
        return true;
    }

    private function editUserType() {
        $sql = "UPDATE user_types SET name=:name, lastmodifiedat=:lastmodifiedat, lastmodifiedby=:lastmodifiedby WHERE id=:id";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("id", $_SESSION['user_type']);
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedat", date("Y-m-d H:i:s"));
        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }
    
    public function fetchSystemPrivilegeDetails($code) {
        $sql = "SELECT * FROM system_privileges WHERE id=:code";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindParam("code", $code);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $info[0];
    }

    public function fetchStatusCodeDetails($code) {
        $sql = "SELECT * FROM status_codes WHERE id=:code";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindParam("code", $code);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $info[0];
    }

    public function fetchSystemComponentDetails($code) {
        $sql = "SELECT * FROM system_components WHERE id=:code";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindParam("code", $code);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $info[0];
    }

    public function getAllRolePrivileges($role) {
        $sql = "SELECT * FROM role_privileges WHERE role=:role ORDER BY createdat ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("role", $role);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "role" => $data['role'], "privilege" => $data['privilege'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getAllBookLevels() {
        $sql = "SELECT * FROM book_levels ORDER BY createdat ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "name" => $data['name'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getAllBookTypes() {
        $sql = "SELECT * FROM book_types ORDER BY createdat ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "name" => $data['name'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getAllUserTypes() {
        $sql = "SELECT * FROM user_types ORDER BY createdat ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "name" => $data['name'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getAllRoles() {
        $sql = "SELECT * FROM roles ORDER BY createdat ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "name" => $data['name'], "description" => $data['description'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getAllStatuses() {
        $sql = "SELECT * FROM status_codes ORDER BY createdat ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "status_code" => $data['status_code'], "description" => $data['description'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getAllSystemComponents() {
        $sql = "SELECT * FROM system_components ORDER BY createdat ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "name" => $data['name'], "acronym" => $data['acronym'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getAllSystemPrivileges() {
        $sql = "SELECT * FROM system_privileges ORDER BY createdat ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "name" => $data['name'], "component" => $data['component'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getAllCounties() {
        $sql = "SELECT * FROM counties ORDER BY createdat ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "name" => $data['name'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getAllSubCounties() {
        $sql = "SELECT * FROM sub_counties ORDER BY createdat ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "name" => $data['name'], "county_id" => $data['county_id'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getAllLocations() {
        $sql = "SELECT * FROM locations ORDER BY createdat ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "name" => $data['name'], "sub_county_id" => $data['sub_county_id'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getAllPaymentOptions() {
        $sql = "SELECT * FROM payment_options ORDER BY createdat ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "name" => $data['name'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby'], "lastmodifiedat" => $data['lastmodifiedat'], "lastmodifiedby" => $data['lastmodifiedby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getComponents() {
        $sql = "SELECT id, name, status FROM system_components WHERE status=1021 "
                . " ORDER BY name ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $currentGroup = null;
        $html = "";
        while ($row = $stmt->fetch()) {
            if (is_null($currentGroup)) {
                $currentGroup = $row['name'];
                $html .= "<option value=\"{$row['id']}\" selected>{$row['name']}</option>";
            } else {
                $html .= "<option value=\"{$row['id']}\">{$row['name']}</option>";
            }
        }
        if ($html == "")
            $html = "<option value=\"\">No component entered into the database!</option>";
        echo $html;
        return $currentGroup;
    }

    public function getPaymentOptions() {
        $sql = "SELECT id, name, status FROM payment_options WHERE status=1021 "
                . " ORDER BY name ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $currentGroup = null;
        $html = "";
        while ($row = $stmt->fetch()) {
            if (is_null($currentGroup)) {
                $currentGroup = $row['name'];
                $html .= "<option value=\"0\" selected>Select Payment Option</option>";
                $html .= "<option value=\"{$row['id']}\">{$row['name']}</option>";
            } else {
                $html .= "<option value=\"{$row['id']}\">{$row['name']}</option>";
            }
        }
        if ($html == "")
            $html = "<option value=\"\">No payment option entered into the database!</option>";
        echo $html;
        return $currentGroup;
    }

    public function getBookTypes() {
        $sql = "SELECT id, name, status FROM book_types WHERE status=1021 "
                . " ORDER BY name ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $currentGroup = null;
        $html = "";
        while ($row = $stmt->fetch()) {
            if (is_null($currentGroup)) {
                $currentGroup = $row['name'];
                $html .= "<option value=\"{$row['id']}\" selected>{$row['name']}</option>";
            } else {
                $html .= "<option value=\"{$row['id']}\">{$row['name']}</option>";
            }
        }
        if ($html == "")
            $html = "<option value=\"\">No book type entered into the database!</option>";
        echo $html;
        return $currentGroup;
    }

    public function getBookLevels() {
        $sql = "SELECT id, name, status FROM book_levels WHERE status=1021 "
                . " ORDER BY name ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $currentGroup = null;
        $html = "";
        while ($row = $stmt->fetch()) {
            if (is_null($currentGroup)) {
                $currentGroup = $row['name'];
                $html .= "<option value=\"0\" selected>Select Book Level</option>";
                $html .= "<option value=\"111111111111\">ALL BOOK LEVELS</option>";
                $html .= "<option value=\"{$row['id']}\">{$row['name']}</option>";
            } else {
                $html .= "<option value=\"{$row['id']}\">{$row['name']}</option>";
            }
        }
        if ($html == "")
            $html = "<option value=\"\">No book level entered into the database!</option>";
        echo $html;
        return $currentGroup;
    }

    public function getUserTypes() {
        $sql = "SELECT id, name, status FROM user_types WHERE status=1021 "
                . " ORDER BY name ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $currentGroup = null;
        $html = "";
        while ($row = $stmt->fetch()) {
            if (is_null($currentGroup)) {
                $currentGroup = $row['name'];
                $html .= "<option value=\"{$row['id']}\" selected>{$row['name']}</option>";
            } else {
                $html .= "<option value=\"{$row['id']}\">{$row['name']}</option>";
            }
        }
        if ($html == "")
            $html = "<option value=\"\">No user type entered into the database!</option>";
        echo $html;
        return $currentGroup;
    }

    public function getRoles() {
        $sql = "SELECT id, name, status FROM roles WHERE status=1021 "
                . " ORDER BY id ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $currentGroup = null;
        $html = "";
        while ($row = $stmt->fetch()) {
            if (is_null($currentGroup)) {
                $currentGroup = $row['name'];
                $html .= "<option value=\"{$row['id']}\" selected>{$row['name']}</option>";
            } else {
                $html .= "<option value=\"{$row['id']}\">{$row['name']}</option>";
            }
        }
        if ($html == "")
            $html = "<option value=\"\">No role entered into the database!</option>";
        echo $html;
        return $currentGroup;
    }

    public function getCounties() {
        $sql = "SELECT id, name, status FROM counties WHERE status=1021 "
                . " ORDER BY id ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $currentGroup = null;
        $html = "";
        while ($row = $stmt->fetch()) {
            if (is_null($currentGroup)) {
                $currentGroup = $row['name'];
                $html .= "<option value=\"{$row['id']}\" selected>{$row['name']}</option>";
            } else {
                $html .= "<option value=\"{$row['id']}\">{$row['name']}</option>";
            }
        }
        if ($html == "")
            $html = "<option value=\"\">No county entered into the database!</option>";
        echo $html;
        return $currentGroup;
    }

    public function getSubCounties() {
        $sql = "SELECT id, name, county_id status FROM sub_counties WHERE status=1021 "
                . " ORDER BY county_id ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $currentGroup = null;
        $html = "";
        while ($row = $stmt->fetch()) {
            if (is_null($currentGroup)) {
                $currentGroup = $row['name'];
                $html .= "<option value=\"{$row['id']}\" selected>{$row['name']}</option>";
            } else {
                $html .= "<option value=\"{$row['id']}\">{$row['name']}</option>";
            }
        }
        if ($html == "")
            $html = "<option value=\"\">No sub-county entered into the database!</option>";
        echo $html;
        return $currentGroup;
    }

    public function getLocations() {
        $sql = "SELECT id, name, sub_county_id status FROM locations WHERE status=1021 "
                . " ORDER BY name ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $currentGroup = null;
        $html = "";
        while ($row = $stmt->fetch()) {
            if (is_null($currentGroup)) {
                $currentGroup = $row['name'];
                $html .= "<option value=\"{$row['id']}\" selected>{$row['name']}</option>";
            } else {
                $html .= "<option value=\"{$row['id']}\">{$row['name']}</option>";
            }
        }
        if ($html == "")
            $html = "<option value=\"\">No location entered into the database!</option>";
        echo $html;
        return $currentGroup;
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    private function editInstitution() {
        $sql = "UPDATE institutions SET code=:code, name=:name, level=:level, parent=:parent, phone_number=:phone_number, email=:email, postal_number=:postal_number, "
                . "postal_code=:postal_code, town=:town, website=:website, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:id";
        $stmt = $this->prepareQuery($sql);
        if (strtoupper($_POST['level']) == "PARENT") {
            $stmt->bindValue("code", strtoupper($_POST['code']));
        } else if (strtoupper($_POST['level']) == "CHILD") {
            $stmt->bindValue("code", strtoupper($_POST['parent']) . strtoupper($_POST['code']));
        }
        $stmt->bindValue("id", $_SESSION['institution']);
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("level", strtoupper($_POST['level']));
        $stmt->bindValue("parent", strtoupper($_POST['parent']));
        $stmt->bindValue("phone_number", strtoupper($_POST['phone_number']));
        $stmt->bindValue("email", strtoupper($_POST['email']));
        $stmt->bindValue("postal_number", strtoupper($_POST['postal_number']));
        $stmt->bindValue("postal_code", strtoupper($_POST['postal_code']));
        $stmt->bindValue("town", strtoupper($_POST['town']));
        $stmt->bindValue("website", strtoupper($_POST['website']));
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedat", date("Y-m-d H:i:s"));
        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }

    private function editStatusCode() {
        $sql = "UPDATE status_codes SET status_code=:status_code, description=:description, lastmodifiedat=:lastmodifiedat, lastmodifiedby=:lastmodifiedby WHERE id=:id";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("id", $_SESSION['status_code']);
        $stmt->bindValue("status_code", strtoupper($_POST['status_code']));
        $stmt->bindValue("description", strtoupper($_POST['description']));
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedat", date("Y-m-d H:i:s"));
        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }

    private function editSystemComponent() {
        $sql = "UPDATE system_components SET name=:name, acronym=:acronym, lastmodifiedat=:lastmodifiedat, lastmodifiedby=:lastmodifiedby WHERE id=:id";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("id", $_SESSION['system_component']);
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("acronym", strtoupper($_POST['acronym']));
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedat", date("Y-m-d H:i:s"));
        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }

    private function editSystemPrivilege() {
        $sql = "UPDATE system_privileges SET name=:name, component=:component, lastmodifiedat=:lastmodifiedat, lastmodifiedby=:lastmodifiedby WHERE id=:id";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("id", $_SESSION['system_privilege']);
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("component", strtoupper($_POST['component']));
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedat", date("Y-m-d H:i:s"));
        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }

    private function editCollectionPoint() {
        $sql = "UPDATE collection_points SET code=:code, name=:name, description=:description, institution=:institution, phone_number=:phone_number, email=:email, "
                . "postal_number=:postal_number, postal_code=:postal_code, town=:town, website=:website, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:id";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("id", $_SESSION['collection_point']);
        $stmt->bindValue("code", strtoupper($_POST['institution']) . "/" . strtoupper($_POST['code']));
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("description", strtoupper($_POST['description']));
        $stmt->bindValue("institution", strtoupper($_POST['institution']));
        $stmt->bindValue("phone_number", strtoupper($_POST['phone_number']));
        $stmt->bindValue("email", strtoupper($_POST['email']));
        $stmt->bindValue("postal_number", strtoupper($_POST['postal_number']));
        $stmt->bindValue("postal_code", strtoupper($_POST['postal_code']));
        $stmt->bindValue("town", strtoupper($_POST['town']));
        $stmt->bindValue("website", strtoupper($_POST['website']));
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedat", date("Y-m-d H:i:s"));
        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }

    public function updateInstitution($code, $update_type) {
        if ($update_type == "deactivate") {
            $sql = "UPDATE institutions SET status=1002, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:code";
        } else if ($update_type == "activate") {
            $sql = "UPDATE institutions SET status=1021, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:code";
        } else if ($update_type == "delete") {
            $sql = "UPDATE institutions SET status=1000, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:code";
        }
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("code", $code);
        $stmt->bindValue("lastmodifiedby", 01); //  echo $_SESSION['userid']);
        $stmt->bindValue("lastmodifiedat", date("Y-m-d H:i:s"));
        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }

    public function updateStatusCode($code, $update_type) {
        if ($update_type == "deactivate") {
            $sql = "UPDATE status_codes SET status=1002, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:code";
        } else if ($update_type == "activate") {
            $sql = "UPDATE status_codes SET status=1021, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:code";
        } else if ($update_type == "delete") {
            $sql = "UPDATE status_codes SET status=1000, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:code";
        }
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("code", $code);
        $stmt->bindValue("lastmodifiedby", 01); //  echo $_SESSION['userid']);
        $stmt->bindValue("lastmodifiedat", date("Y-m-d H:i:s"));
        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }

    public function updateSystemComponent($code, $update_type) {
        if ($update_type == "deactivate") {
            $sql = "UPDATE system_components SET status=1002, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:code";
        } else if ($update_type == "activate") {
            $sql = "UPDATE system_components SET status=1021, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:code";
        } else if ($update_type == "delete") {
            $sql = "UPDATE system_components SET status=1000, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:code";
        }
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("code", $code);
        $stmt->bindValue("lastmodifiedby", 01); //  echo $_SESSION['userid']);
        $stmt->bindValue("lastmodifiedat", date("Y-m-d H:i:s"));
        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }

    public function updateSystemPrivilege($code, $update_type) {
        if ($update_type == "deactivate") {
            $sql = "UPDATE system_privileges SET status=1002, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:code";
        } else if ($update_type == "activate") {
            $sql = "UPDATE system_privileges SET status=1021, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:code";
        } else if ($update_type == "delete") {
            $sql = "UPDATE system_privileges SET status=1000, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:code";
        }
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("code", $code);
        $stmt->bindValue("lastmodifiedby", 01); //  echo $_SESSION['userid']);
        $stmt->bindValue("lastmodifiedat", date("Y-m-d H:i:s"));
        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }

    public function updateCollectionPoint($code, $update_type) {
        if ($update_type == "deactivate") {
            $sql = "UPDATE collection_points SET status=1002, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:code";
        } else if ($update_type == "activate") {
            $sql = "UPDATE collection_points SET status=1021, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:code";
        } else if ($update_type == "delete") {
            $sql = "UPDATE collection_points SET status=1000, lastmodifiedby=:lastmodifiedby, lastmodifiedat=:lastmodifiedat WHERE id=:code";
        }
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("code", $code);
        $stmt->bindValue("lastmodifiedby", 01); //  echo $_SESSION['userid']);
        $stmt->bindValue("lastmodifiedat", date("Y-m-d H:i:s"));
        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }

    public function fetchCollectionPointDetails($code) {
        $sql = "SELECT * FROM collection_points WHERE id=:code";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindParam("code", $code);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $info[0];
    }

    public function fetchInboxMessageDetails($code) {
        $sql = "SELECT * FROM inbox_messages WHERE id=:code";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindParam("code", $code);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $info[0];
    }

    public function fetchInstitutionDetails($code) {
        $sql = "SELECT * FROM institutions WHERE id=:code";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindParam("code", $code);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $info[0];
    }

    private function addEmailMessage() {
        $sql = "INSERT INTO inbox_messages (name, email, message)"
                . " VALUES (:name, :email, :message)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("email", strtoupper($_POST['email']));
        $stmt->bindValue("message", strtoupper($_POST['message']));
        $stmt->execute();
        return true;
    }

    private function addCollectionPoint() {
        $sql = "INSERT INTO collection_points (code, name, description, institution, phone_number, email, postal_number, postal_code, town, website, createdby, lastmodifiedat, lastmodifiedby)"
                . " VALUES (:code, :name, :description, :institution, :phone_number, :email, :postal_number, :postal_code, :town, :website, :createdby, :lastmodifiedat, :lastmodifiedby)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("code", strtoupper($_POST['institution']) . "/" . strtoupper($_POST['code']));
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("description", strtoupper($_POST['description']));
        $stmt->bindValue("institution", strtoupper($_POST['institution']));
        $stmt->bindValue("phone_number", strtoupper($_POST['phone_number']));
        $stmt->bindValue("email", strtoupper($_POST['email']));
        $stmt->bindValue("postal_number", strtoupper($_POST['postal_number']));
        $stmt->bindValue("postal_code", strtoupper($_POST['postal_code']));
        $stmt->bindValue("town", strtoupper($_POST['town']));
        $stmt->bindValue("website", strtoupper($_POST['website']));
        $stmt->bindValue("createdby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']); //  echo $_SESSION['userid']);
        $stmt->bindValue("lastmodifiedat", date("Y-m-d H:i:s"));
        $stmt->execute();
        return true;
    }

    private function addInstitution() {
        $sql = "INSERT INTO institutions (code, name, level, parent, phone_number, email, postal_number, postal_code, town, website, createdby, lastmodifiedat, lastmodifiedby)"
                . " VALUES (:code, :name, :level, :parent, :phone_number, :email, :postal_number, :postal_code, :town, :website, :createdby, :lastmodifiedat, :lastmodifiedby)";
        $stmt = $this->prepareQuery($sql);
        if (strtoupper($_POST['level']) == "PARENT") {
            $stmt->bindValue("code", strtoupper($_POST['code']));
        } else if (strtoupper($_POST['level']) == "CHILD") {
            $stmt->bindValue("code", strtoupper($_POST['parent']) . strtoupper($_POST['code']));
        }
        $stmt->bindValue("name", strtoupper($_POST['name']));
        $stmt->bindValue("level", strtoupper($_POST['level']));
        $stmt->bindValue("parent", strtoupper($_POST['parent']));
        $stmt->bindValue("phone_number", strtoupper($_POST['phone_number']));
        $stmt->bindValue("email", strtoupper($_POST['email']));
        $stmt->bindValue("postal_number", strtoupper($_POST['postal_number']));
        $stmt->bindValue("postal_code", strtoupper($_POST['postal_code']));
        $stmt->bindValue("town", strtoupper($_POST['town']));
        $stmt->bindValue("website", strtoupper($_POST['website']));
        $stmt->bindValue("createdby", $_POST['createdby']);
        $stmt->bindValue("lastmodifiedby", $_POST['createdby']); //  echo $_SESSION['userid']);
        $stmt->bindValue("lastmodifiedat", date("Y-m-d H:i:s"));
        $stmt->execute();
        return true;
    }

    public function getCollectionPoints() {
        $sql = "SELECT id, code, name, institution, status FROM collection_points WHERE status=1021 "
                . " ORDER BY institution ASC, name ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $currentGroup = null;
        $html = "";
        while ($row = $stmt->fetch()) {
            if (is_null($currentGroup)) {
                $institution_details = $this->fetchInstitutionDetails($row['institution']);
                $currentGroup = $row['name'];
                $html .= "<option value=\"{$row['id']}\" selected>{$institution_details['name']} - {$row['name']}</option>";
                $html .= "<option value=0>OTHER</option>";
            } else {
                $html .= "<option value=\"{$row['id']}\">{$row['institution']} - {$row['name']}</option>";
                $html .= "<option value=0>OTHER</option>";
            }
        }
        if ($html == "")
            $html = "<option value=\"\">No parent institution entered into the database!</option>";
        echo $html;
        return $currentGroup;
    }

    public function getInstitutions() {
        $sql = "SELECT id, code, name, status FROM institutions WHERE status=1021 "
                . " ORDER BY name ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $currentGroup = null;
        $html = "";
        while ($row = $stmt->fetch()) {
            if (is_null($currentGroup)) {
                $currentGroup = $row['name'];
                $html .= "<option value=\"{$row['id']}\" selected>{$row['name']}</option>";
            } else {
                $html .= "<option value=\"{$row['id']}\">{$row['name']}</option>";
                $html .= "<option value=0>OTHER</option>";
            }
        }
        if ($html == "")
            $html = "<option value=\"\">No parent institution entered into the database!</option>";
        echo $html;
        return $currentGroup;
    }

    public function getPrivileges() {
        $sql = "SELECT id, name, status FROM system_privileges WHERE status=1021 "
                . " ORDER BY name ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $currentGroup = null;
        $html = "";
        while ($row = $stmt->fetch()) {
            if (is_null($currentGroup)) {
                $currentGroup = $row['name'];
                $html .= "<option value=\"{$row['id']}\" selected>{$row['name']}</option>";
            } else {
                $html .= "<option value=\"{$row['id']}\">{$row['name']}</option>";
            }
        }
        if ($html == "")
            $html = "<option value=\"\">No privilege entered into the database!</option>";
        echo $html;
        return $currentGroup;
    }

    public function getParentInstitutions() {
        $sql = "SELECT id, code, name, level, parent, phone_number, email, postal_number, postal_code, town, website, status FROM institutions WHERE status=1021 "
                . "AND level=:level ORDER BY name ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("level", "PARENT");
        $stmt->execute();
        $currentGroup = null;
        $html = "";
        while ($row = $stmt->fetch()) {
            if (is_null($currentGroup)) {
                $currentGroup = $row['name'];
                $html .= "<option value=0 selected>ROOT</option>";
                $html .= "<option value=\"{$row['id']}\">{$row['name']}</option>";
            } else {
                $html .= "<option value=\"{$row['id']}\">{$row['name']}</option>";
            }
        }
        if ($html == "")
            $html = "<option value=\"\">No parent institution entered into the database!</option>";
        echo $html;
        return $currentGroup;
    }

    public function getAllInboxMessages() {
        $sql = "SELECT * FROM inbox_messages ORDER BY id DESC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "name" => $data['name'], "email" => $data['email'], "message" => $data['message'], "createdat" => $data['createdat']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getAllInstitutions() {
        $sql = "SELECT * FROM institutions ORDER BY createdat ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "code" => $data['code'], "name" => $data['name'], "level" => $data['level'], "parent" => $data['parent'],
                    "phone_number" => $data['phone_number'], "email" => $data['email'], "postal_number" => $data['postal_number'], "postal_code" => $data['postal_code'],
                    "town" => $data['town'], "website" => $data['website'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

    public function getAllCollectionPoints() {
        $sql = "SELECT * FROM collection_points ORDER BY createdat ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($info) == 0) {
            $_SESSION['no_records'] = true;
        } else {
            $_SESSION['yes_records'] = true;
            $values2 = array();
            foreach ($info as $data) {
                $values = array("id" => $data['id'], "code" => $data['code'], "name" => $data['name'], "description" => $data['description'], "institution" => $data['institution'], "phone_number" => $data['phone_number'], "email" => $data['email'], "postal_number" => $data['postal_number'],
                    "postal_code" => $data['postal_code'], "town" => $data['town'], "website" => $data['website'], "status" => $data['status'], "createdat" => $data['createdat'], "createdby" => $data['createdby']);
                array_push($values2, $values);
            }
            return json_encode($values2);
        }
    }

}
