<?php
    class ContactController extends Controller{

        public function Process($params)
        {
            $this->header = [
                'title' => 'Kontaktní formulář',
                'key_words' => 'kontakt, email, formulář',
                'description' => 'Kontaktní formulář našeho webu'
            ];

            if(isset($_POST["email"])){
                $email_sender = new EmailSender();
                $email_sender->SendEmail();
            }

            $this->view = "contact";
        }
    }
?>