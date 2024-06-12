var open=document.getElementById('open');
var close=document.getElementById('close');
var windw=document.getElementById('windw');





function openk(){
    windw.style.display = 'block';

    
}

function closek(){
    windw.style.display = 'none';
   
}

window.onclick = function(event) {
    if (event.target == windw) {
      windw.style.display = "none";
    }
  }


  window.onclick = function(event) {
    if (event.target == windw1) {
      windw1.style.display = "none";
    }
  }





var open_1=document.getElementById('open1');
var closem_1=document.getElementById('close1');
var windw_1=document.getElementById('windw1');
function openl(){
    windw_1.style.display = 'block';
    
}

function closel(){
    windw_1.style.display = 'none';
}




var small_menu = document.querySelector('.toggle_menu')
var menu = document.querySelector('.menu')

small_menu.onclick = function(){
     small_menu.classList.toggle('active');
     menu.classList.toggle('responsive');
}
  




document.addEventListener('DOMContentLoaded', function () {
  const toggleBtns = document.querySelectorAll('.toggle-btn');

  toggleBtns.forEach(btn => {
      btn.addEventListener('click', function () {
          const answer = this.nextElementSibling;
          answer.classList.toggle('active');

          // Toggle the rotation of the button
          this.classList.toggle('rotate');
      });
  });
});

// function change(button) {
//   button.style.display = 'none';
//   button.nextElementSibling.style.display = 'block';
// }

// href="validate_offre.php?v='.$row['id_offre'].'"
// onclick="return confirm(\'Are you sure you want to validate this offer?\');"












var hawes=document.getElementById('hawes');
var close=document.getElementById('close');
var search=document.getElementById('search');



function beyn(){
  search.style.display='flex';
  hawes.style.display='none';

}

function khabi(){
  search.style.display='none';
  hawes.style.display='block';

}



document.addEventListener('DOMContentLoaded', function () {
 
  var cas = document.getElementById('cas');

  
  var rs=document.getElementById('rs');
  var os=document.getElementById('os');
  var us=document.getElementById('us');
  var ss=document.getElementById('ss');
  

  cas.addEventListener('change', function() {

      if (cas.value === 'a') {
        rs.style.display='flex';
        os.style.display='flex';
        us.style.display='flex';
        ss.style.display='flex';
      }

      if (cas.value === 'b') {
        rs.style.display='flex';
        os.style.display='none';
        us.style.display='none';
        ss.style.display='none';
      }

      if (cas.value === 'c') {
        rs.style.display='none';
        os.style.display='flex';
        us.style.display='none';
        ss.style.display='none';
      }

      if (cas.value === 'd') {
        rs.style.display='none';
        os.style.display='none';
        us.style.display='flex';
        ss.style.display='none';
      }

      if (cas.value === 'e') {
        rs.style.display='none';
        os.style.display='none';
        us.style.display='none';
        ss.style.display='flex';
      }
      
      
    
          });



  });
       










  