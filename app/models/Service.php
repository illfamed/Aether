<?php
    class Service{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getServices(){
            $this->db->query('SELECT *,
                            services.id as servicesId,
                            users.id as userId,
                            services.created_at as servicesCreated,
                            users.created_at as userCreated
                            FROM services
                            INNER JOIN users
                            ON services.user_id = users.id
                            ORDER BY services.created_at ASC');

            $results = $this->db->resultSet();

            return $results;
        }

        public function add($data){
            $this->db->query('INSERT INTO services (title, user_id, body) VALUES(:title, :user_id, :body)');
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':body', $data['body']);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updateService($data){
            $this->db->query('UPDATE services SET title = :title, body = :body WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getServiceById($id){
            $this->db->query('SELECT * FROM services WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function delete($id){
            $this->db->query('DELETE FROM services WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $id);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }