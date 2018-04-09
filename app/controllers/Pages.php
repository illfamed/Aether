<?php
    class Pages extends Controller {
        public function __construct(){
            
        }

        public function index(){
            

            $data = [
                'title' => 'Aether',
                'description' => 'Web application built on a custom PHP framework.'
            ];

            $this->view('pages/index', $data);
        }

        public function about(){
            $data = [
                'title' => 'About Us',
                'description' => 'Let us all rise to the aether.'
            ];
            $this->view('pages/about', $data);
        }

        public function admin(){
            if(isAdmin()){
                $this->view('pages/admin');
            } else {
                $this->view('pages/index');
            }
        }

        public function edit(){
            if(isAdmin()){
                $this->view('services/edit');
            } 
        }

        public function delete(){
            if(isAdmin()){
                $this->view('services');
            } 
        }
    }