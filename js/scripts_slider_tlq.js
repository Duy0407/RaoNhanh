$(document).ready(function() {

  var $btnNext = $('.next_tlq');
  var $btnPrev = $('.back_tlq');
  var $indexPhoto = $('.detail_slider_tlq').find('.mySlides');
  var $indexCircle = $('.controls').find('i.fired');
  var $indexPoint = $('.controls').find('li');
  var $detail_slider_tlq = $('.detail_slider_tlq');
  var counter = 2;
  var myInterval = 4000;

  var time = setInterval(changeSlide, myInterval);
  $indexCircle.eq(0).css('display', 'inline-block');

  console.log(counter);

  function changeSlide() {
    $detail_slider_tlq.animate({
      marginLeft: '-400px'
    }, 500, moveFirstSlide);
    changeCircle();
  }

  function moveFirstSlide() {
    var firstSlide = $detail_slider_tlq.find('.mySlides:first');
    $detail_slider_tlq.append(firstSlide);
    $detail_slider_tlq.css('marginLeft', '0');
    $indexPhoto = $detail_slider_tlq.find('.mySlides');
  }

  function moveLastSlide() {
    var lastSlide = $detail_slider_tlq.find('.mySlides:last');
    $detail_slider_tlq.prepend(lastSlide);
    $detail_slider_tlq.css('marginLeft', '0');
    indexPhoto = $detail_slider_tlq.find('.mySlides');
  }

  $btnNext.click(function() {
    $detail_slider_tlq.animate({
      marginLeft: '-400px'
    }, 500, moveFirstSlide);
    clearInterval(time);
    time = setInterval(changeSlide, myInterval);
    changeCircle();
  });

  $btnPrev.click(function() {
    $detail_slider_tlq.animate({
      marginLeft: '400px'
    }, 500, moveLastSlide);
    clearInterval(time);
    time = setInterval(changeSlide, myInterval);
    changeCircleBack();
  });

  function changeCircle() {
    counter++;
    if (counter > $indexPhoto.length) counter = 1;
    toEmptyCircle();
    $indexCircle.eq(counter - 1).css('display', 'inline-block');
  }

  function toEmptyCircle() {
    $indexCircle.each(function() {
      $(this).css('display', 'none');
    });
  }

  function changeCircleBack() {
    counter--;
    if (counter == 0) counter = $indexPhoto.length;
    toEmptyCircle();
    $indexCircle.eq(counter - 1).css('display', 'inline-block');
  }

  $indexPoint.each(function() {
    $(this).click(function() {
      
      $indexCircle.each(function() {

        $(this).css('display', 'none');
      });
      $(this).find('i').css('display', 'inline-block');

      $getIdPoint = $(this).attr('id');
      moveSlidePoint();

      /*console.log('counter wynosi: ' + counter + ' a distPoint wynosi: ' + distPoint);*/

      clearInterval(time);
      time = setInterval(changeSlide, myInterval);
      counter = $(this).attr('id');
    });
  });

  function moveSlidePoint() {
    if (counter < $getIdPoint) {
      distPoint = $getIdPoint - counter;
      pickGalleryNext(distPoint);
    } 
    else {
      distPoint = counter - $getIdPoint;
      pickGalleryBack(distPoint);
    }
  }

  function pickGalleryNext(num) {
    for (var i = 0; i < num; i++) {
      $detail_slider_tlq.append($detail_slider_tlq.find('.mySlides:first'));
    }
  }

  function pickGalleryBack(num) {
    for (var i = 0; i < num; i++) {
      $detail_slider_tlq.prepend($detail_slider_tlq.find('.mySlides:last'));
    }
  }
});