<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function slug($string){
   $slug = preg_replace('/[^a-zA-Z0-9_.]/', '_', $string);
   return $slug;
}