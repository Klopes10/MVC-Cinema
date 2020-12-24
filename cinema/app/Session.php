<?php
    namespace App;

    session_start();

    abstract class Session {

        private static $categories = ['error', 'success'];
        
        public static function setToken(){
            $token = bin2hex(random_bytes(32));
            $_SESSION['token'] = $token;
        }
        
        public static function getToken(){
            if(isset($_SESSION['token'])){
                $token = $_SESSION['token'];  
            }
            else $token = "";
            
            return $token;
        }

        public static function addFlash($categ, $msg){
            $_SESSION[$categ] = $msg;
        }

        public static function getFlash($categ){
            
            if(isset($_SESSION[$categ])){
                $msg = $_SESSION[$categ];  
                unset($_SESSION[$categ]);
            }
            else $msg = "";
            
            return $msg;
        }
                
        public static function getUser(){
            if(isset($_SESSION['user']) && $_SESSION['user'] !== null){
                return $_SESSION['user'];
            }
            return false;
        }
        
        public static function setUser($user){
            $_SESSION['user'] = $user;
        }
        
        public static function removeUser(){
            if(self::getUser()){
                unset($_SESSION['user']);
            }
            return;
        }
        
        public static function authenticationRequired($roleToHave){
            if(!self::getUser()){
                Router::redirectTo("forum", "index");
            }
        }
        
        public static function generateKey(){
            if(!isset($_SESSION['key']) || $_SESSION['key'] === null){
                $_SESSION['key'] = bin2hex(random_bytes(32));
            }
        }
        
        public static function getKey(){
            return $_SESSION['key'];
        }
    }