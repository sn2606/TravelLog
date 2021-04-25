// onload document window using js
window.onload = function(){
    //   pick body element ID
    var image = document.getElementById("content");

    var x = window.matchMedia("(max-width: 1025px)");
    if(x.matches){
      image.style.backgroundImage = 'background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../Images/Mobile-Background/pexels-alex-azabache-3214958.jpg")';
      image.style.backgroundSize = "cover";
      image.style.backgroundRepeat = "no-repeat";
      image.style.backgroundPosition = "center";

      //   Background Images
      var images = [
        'url(../Images/Mobile-Background/pexels-taryn-elliott-3889855.jpg)',
        'url(../Images/Mobile-Background/pexels-alex-azabache-3214958.jpg)',
        'url(../Images/Mobile-Background/pexels-ketut-subiyanto-4429452.jpg)',
        'url(../Images/Background/pexels-dominika-roseclay-1252500.jpg)',
        'url(../Images/Mobile-Background/pexels-michael-block-3225529.jpg)',
        'url(../Images/Mobile-Background/pexels-simon-migaj-885880.jpg)',
      ]
      
    //   change image every after 5 seconds
      var i = 0;
      images.onload = setInterval(function() {
          i = Math.floor(images.length * Math.random());
          image.style.backgroundImage = 'linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), ' + images[i];
          image.style.backgroundSize = "cover";
          image.style.backgroundRepeat = "no-repeat";
          image.style.backgroundPosition = "center";
        if(i == images.length - 1)
          i = 0;
      }, 5000)

    } else {
          
    //   set initial background-image
      image.style.backgroundImage = 'linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), ' + 'url(../Images/Background/pexels-mohamed-almari-368893.jpg)';
      image.style.backgroundSize = "cover";
      image.style.backgroundRepeat = "no-repeat";
      image.style.backgroundPosition = "center";
      
    //   Background Images
      var images = [
          'url(../Images/Background/img1.jpg)', 
          'url(../Images/Background/img2.jpg)',
          'url(../Images/Background/img3.jpg)',
          'url(../Images/Background/img4jpg)',
          'url(../Images/Background/img5.jpg)',
          'url(../Images/Background/pexels-andrei-tanase-1271619.jpg)',
          'url(../Images/Background/pexels-dominika-roseclay-1252500.jpg)',
          'url(../Images/Background/pexels-ketut-subiyanto-4436363.jpg)',
          'url(../Images/Background/pexels-nappy-1058959.jpg)',
          'url(../Images/Background/pexels-pixabay-531321.jpg)',
          'url(../Images/Background/pexels-mohamed-almari-368893.jpg)',
      ]
      
    //   change image every after 5 seconds
      var i = 0;
      images.onload = setInterval(function() {
          i = Math.floor(images.length * Math.random());
          console.log(i);

          // $('#content').animate({opacity: 0}, 'slow', function() {
          //     $(this).css({
          //         'background-image': images[i]
          //     }).animate({opacity: 1}, 'fast');
          // });
          image.style.backgroundImage = 'linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), ' + images[i];
          image.style.backgroundSize = "cover";
          image.style.backgroundRepeat = "no-repeat";
          image.style.backgroundPosition = "center";
        if(i == images.length - 1)
          i = 0;
      }, 5000)
    }
}