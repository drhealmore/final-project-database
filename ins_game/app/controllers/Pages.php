<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
        'title' => 'Inscryption Card Manager',
        'description' => 'This is an application for managing cards for the game Inscryption.'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'Do you like card games? No? Then what are you doing here? Go get someone that will actually appreciate this card manager. Anyways, this was made to try and test out PHP coding with databases and the like.'
      ];

      $this->view('pages/about', $data);
    }
  }