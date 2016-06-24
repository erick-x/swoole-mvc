/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
$(function() {
    $("#platformid").change(function()
    {
        setCookie('zoneid', $("#platformid").val());       
        window.location.href = window.location.href;
             
    });
 });
  

