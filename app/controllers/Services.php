<?php
    class Services extends Controller {
        public function __construct(){

            $this->serviceModel = $this->model('Service');
            $this->userModel = $this->model('User');
        }

        public function index(){
            // Get services
            $services = $this->serviceModel->getServices();

            $data = [
                'services' => $services
            ];

            $this->view('services/index', $data);
        }

        public function add(){
            if(isAdmin()){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    // Sanitize Post array
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                    $data = [
                        'title' => trim($_POST['title']),
                        'body' => trim($_POST['body']),
                        'user_id' => $_SESSION['user_id'],
                        'title_err' => '',
                        'body_err' => ''
                    ];

                    // Validate title
                    if(empty($data['title'])){
                        $data['title_err'] = 'Please enter title';
                    }

                    // Validate body
                    if(empty($data['body'])){
                        $data['body_err'] = 'Please enter body text';
                    }

                    // Make sure no error
                    if(empty($data['title_err']) && empty($data['body_err'])){
                        // Validated
                        if($this->serviceModel->add($data)){
                            flash('post_message', 'Service Added');
                            redirect('services');
                        } else {
                            die('Something went wrong');
                        }
                    } else {
                        // Load view with errors
                        $this->view('services/add', $data);
                    }

                } else {
                    $data = [
                        'title' => '',
                        'body' => ''
                    ];
        
                    $this->view('services/add', $data);
                }
            } else {
                $this->view('pages/index');
            }
        }

        public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize Post array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                // Validate title
                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter title';
                }

                // Validate body
                if(empty($data['body'])){
                    $data['body_err'] = 'Please enter body text';
                }

                // Make sure no error
                if(empty($data['title_err']) && empty($data['body_err'])){
                    // Validated
                    if($this->serviceModel->updateService($data)){
                        flash('post_message', 'Service updated');
                        redirect('services/show/'.$id);
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('services/edit', $data);
                }

            } else {
                // Get existing post from model
                $service = $this->serviceModel->getServiceById($id);

                // Check for owner
                if($service->user_id != $_SESSION['user_id']){
                    redirect('services');
                }

                $data = [
                    'id' => $id,
                    'title' => $service->title,
                    'body' => $service->body
                ];
    
                $this->view('services/edit', $data);
            }
        }

        public function show($id){
            $service = $this->serviceModel->getServiceById($id);
            $user = $this->userModel->getUserById($service->user_id);

            $data = [
                'service' => $service,
                'user' => $user
            ];

            $this->view('services/show', $data);
        }

        public function delete($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Get existing post from model
                $service = $this->serviceModel->getServiceById($id);

                // Check for owner
                if($service->user_id != $_SESSION['user_id']){
                    redirect('services');
                }
                if($service->user_id == $_SESSION["user_id"]){
                    if($this->serviceModel->delete($id)){
                        flash('post_message', 'Service removed');
                        redirect('services');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                redirect('services');
            }
        }
    }