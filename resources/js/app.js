import './bootstrap';
import '../sass/app.scss'

import * as bootstrap from  'bootstrap'


document.addEventListener("DOMContentLoaded",function(event){
  
    var obj = this.getElementById('carga');
    setTimeout(function(){
        obj.className += ' hide';
    }, 1100);



    
    });