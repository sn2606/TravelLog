// onload document window using jquery
$().ready(function(){
    var i = 0;
    
  //   Background Images
    var images = [
        'url(../Images/Background/img1.jpg)', 
        'url(../Images/Background/img2.jpg)',
        'url(../Images/Background/img3.jpg)',
        'url(../Images/Background/img4jpg)',
        'url(../Images/Background/img5.jpg)'
    ]
    
  //   pick body element ID
    var image = $('#imageChange')
    
  //   set initial background-image
    image.css('background-image', 'url(https://picsum.photos/200/300/?blur)')
    
  //   change image every after 5 seconds
    setInterval(function(){
      image.fadeOut(1000, function(){
        image.css('background-image', 'url(' + images [i++] +')')
        image.fadeIn(1000)
      })
      if(1 == images.length)
        i = 0
    }, 5000)
})