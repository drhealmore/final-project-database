<?php
class Cards extends Controller {
    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $this->cardModel = $this->model('Card');
    }
    public function index(){
        $cards = $this->cardModel->getCards();

        $data = ['cards'=>$cards];

        $this->view('cards/index', $data);

    }

    public function show($CardID){
        $card = $this->cardModel->getCardByID($CardID);

        $data = [
            'card'=>$card,
        ];

        $this->view('cards/show',$data);
    }

    public function delete($CardID){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($this->cardModel->deleteCard($CardID)){
                redirect('cards');
            }else{
                die("Something went wrong...");
            }
        }else{
            redirect('cards');
        }
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize post array
          $_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'CardID' => trim($_post['CardID']),
            'CardName' => trim($_post['CardName']),
            'CardHealth' => trim($_post['CardHealth']),
            'CardAttack' => trim($_post['CardAttack']),
            'BloodCost' => trim($_post['BloodCost']),
            'BoneCost' => trim($_post['BoneCost']),
            'TribeID' => trim($_post['TribeID']),
            'FirstSigilID' => trim($_post['FirstSigilID']),
            'SecondSigilID' => trim($_post['SecondSigilID']),
            'CardID_err' => '',
            'CardName_err' => '',
            'CardHealth_err' => '',
            'CardAttack_err' => '',
            'BloodCost_err' => '',
            'BoneCost_err' => '',
            'Tribe_err' => '',
            'FirstSigilID_err' => '',
            'SecondSigilID_err' => ''
          ];
  
          // Validate data
          if(empty($data['CardID'])){
            $data['CardID_err'] = 'Please enter a card ID';
          }
          if(empty($data['CardName'])){
              $data['CardName_err'] = 'Please enter a card name';
            }
          if(empty($data['CardHealth'])){
            $data['CardHealth_err'] = 'Please enter the card health';
          }
          if(empty($data['CardAttack'])){
              $data['CardAttack_err'] = 'Please enter the card attack';
            }
          if(empty($data['BloodCost'])){
                $data['BloodCost_err'] = 'Please enter the blood cost';
              }
          if(empty($data['BoneCost'])){
                $data['BoneCost_err'] = 'Please enter the bone cost';
              }
          if(empty($data['TribeID'])){
                $data['Tribe_err'] = 'Please enter the tribe';
              }
          if(empty($data['FirstSigilID'])){
                $data['FirstSigilID_err'] = 'Please enter the first sigil ID';
              }
          if(empty($data['SecondSigilID'])){
                $data['SecondSigilID_err'] = 'Please enter the second sigil ID';
              }
  
          // Make sure no errors
          if(empty($data['CardID_err']) && empty($data['CardName_err']) && empty($data['CardHealth_err']) && empty($data['CardAttack_err']) && empty($data['BloodCost_err'])&& empty($data['BoneCost_err'])&& empty($data['TribeID_err'])&& empty($data['FirstSigilID_err'])&& empty($data['SecondSigilID_err'])){
            // Validated
      
            if($this->cardModel->addCard($data)){
              redirect('cards');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('cards/add', $data);
          }
        
        
  
        } else {
          $data = [
            'CardID' => '',
            'CardName' => '',
            'CardHealth' => '',
            'CardAttack' => '',
            'BloodCost' => '',
            'BoneCost' => '',
            'TribeID' => '',
            'FirstSigilID' => '',
            'SecondSigilID' => ''
          ];
    
          $this->view('cards/add', $data);
        }
      }

      public function edit($CardID){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize post array
          $_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'CardID' => trim($_post['CardID']),
            'CardName' => trim($_post['CardName']),
            'CardHealth' => trim($_post['CardHealth']),
            'CardAttack' => trim($_post['CardAttack']),
            'BloodCost' => trim($_post['BloodCost']),
            'BoneCost' => trim($_post['BoneCost']),
            'TribeID' => trim($_post['TribeID']),
            'FirstSigilID' => trim($_post['FirstSigilID']),
            'SecondSigilID' => trim($_post['SecondSigilID']),
            'CardID_err' => '',
            'CardName_err' => '',
            'CardHealth_err' => '',
            'CardAttack_err' => '',
            'BloodCost_err' => '',
            'BoneCost_err' => '',
            'Tribe_err' => '',
            'FirstSigilID_err' => '',
            'SecondSigilID_err' => ''
            ];
    
  
          // Validate data
          if(empty($data['CardID'])){
            $data['CardID_err'] = 'Please enter a card ID';
          }
          if(empty($data['CardName'])){
              $data['CardName_err'] = 'Please enter a card name';
            }
          if(empty($data['CardHealth'])){
            $data['CardHealth_err'] = 'Please enter the card health';
          }
          if(empty($data['CardAttack'])){
              $data['CardAttack_err'] = 'Please enter the card attack';
            }
          if(empty($data['BloodCost'])){
                $data['BloodCost_err'] = 'Please enter the blood cost';
              }
          if(empty($data['BoneCost'])){
                $data['BoneCost_err'] = 'Please enter the bone cost';
              }
          if(empty($data['TribeID'])){
                $data['Tribe_err'] = 'Please enter the tribe';
              }
          if(empty($data['FirstSigilID'])){
                $data['FirstSigilID_err'] = 'Please enter the first sigil ID';
              }
          if(empty($data['SecondSigilID'])){
                $data['SecondSigilID_err'] = 'Please enter the second sigil ID';
              }
    
  
          // Make sure no errors
          if(empty($data['CardID_err']) && empty($data['CardName_err']) && empty($data['CardHealth_err']) && empty($data['CardAttack_err']) && empty($data['BloodCost_err'])&& empty($data['BoneCost_err'])&& empty($data['TribeID_err'])&& empty($data['FirstSigilID_err'])&& empty($data['SecondSigilID_err'])){
            // Validated
      
            if($this->cardModel->updateCard($data)){
              redirect('cards');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('cards/edit', $data);
          }
  
        } else {
          // Get existing player from model
          $card = $this->cardModel->getCardById($CardID);
  
  
          $data = [
            'CardID' => '',
            'CardName' => '',
            'CardHealth' => '',
            'CardAttack' => '',
            'BloodCost' => '',
            'BoneCost' => '',
            'TribeID' => '',
            'FirstSigilID' => '',
            'SecondSigilID' => ''
          ];
    
          $this->view('cards/edit', $data);
        }
      }

}
?>