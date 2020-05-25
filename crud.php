<?php
    interface crud{
        public function save();
        public function readAll();
        public function readUnique();
        public function search();
        public function update();
        public function removeOne();
        public function removeAll();
        public function isUserExists();

        //lab 2 addition
        public function validateForm();
        public function validateFormErrorSessions();
    }

?>