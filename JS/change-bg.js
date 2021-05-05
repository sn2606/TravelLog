// onload document window using js
window.onload = function(){
    //   pick body element ID
    var image = document.getElementById("content");

    var x = window.matchMedia("(max-width: 1025px)");
    if(x.matches){
      //   Background Images
      var images = [
        'url(../Images/Mobile-Background/pexels-taryn-elliott-3889855.jpg)',
        'url(../Images/Mobile-Background/pexels-alex-azabache-3214958.jpg)',
        'url(../Images/Mobile-Background/pexels-ketut-subiyanto-4429452.jpg)',
        'url(../Images/Mobile-Background/pexels-simon-migaj-885880.jpg)',
      ]
      
    //   change image every after 5 seconds
      var i = 0;
      i = Math.floor(images.length * Math.random());
      image.style.backgroundImage = 'linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), ' + images[i];
      image.style.backgroundSize = "cover";
      image.style.backgroundRepeat = "no-repeat";
      image.style.backgroundPosition = "center";

    } else {
      
    //   Background Images
      var images = [
          'url(../Images/Background/img1.jpg)',
          'url(../Images/Background/img3.jpg)',
          'url(../Images/Background/img5.jpg)',
          'url(../Images/Background/pexels-dominika-roseclay-1252500.jpg)',
          'url(../Images/Background/pexels-ketut-subiyanto-4436363.jpg)',
          'url(../Images/Background/pexels-nappy-1058959.jpg)',
          'url(../Images/Background/pexels-mohamed-almari-368893.jpg)',
      ]
      
    //   change image every after 5 seconds
      var i = 0;
      i = Math.floor(images.length * Math.random());
      console.log(i);
      image.style.backgroundImage = 'linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), ' + images[i];
      image.style.backgroundSize = "cover";
      image.style.backgroundRepeat = "no-repeat";
      image.style.backgroundPosition = "center";
    }
}