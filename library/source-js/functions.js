window.onload = function() {

  (function($){

    function animateValue(obj, start, end, duration) {
        var range = end - start;
        var current = start;
        var increment = end > start? 1 : -1;
        var stepTime = Math.abs(Math.floor(duration / range));
        var timer = setInterval(function() {
            current += increment;
            //obj.text();
            obj.text(current);
            if (current == end) {
                clearInterval(timer);
            }
        }, stepTime);
    }
    (function() {
      var elements;
      var windowHeight;

      function init() {
        elements = document.querySelectorAll('.animated-block');
        windowHeight = window.innerHeight;
      }

      function checkPosition() {
        for (var i = 0; i < elements.length; i++) {
          var element = elements[i];
          var positionFromTop = elements[i].getBoundingClientRect().top;

          if (positionFromTop - windowHeight <= 0) {
            element.classList.add('active-animation');
            element.classList.remove('animated-block');
          }
        }
        
      }

      window.addEventListener('scroll', checkPosition);
      window.addEventListener('resize', init);

      init();
      checkPosition();
    })();
    if($(".animated-counter").length > 0) {
      const animcount = document.querySelector('.animated-counter');
      const observer = new IntersectionObserver((entries) => {
        for (entry of entries) {
          if(entry.isIntersecting) {
            $(".animated-counter .gr-entry h6 .no-counter").each(function(){
              let endval = parseInt($(this).attr("data-counter"));
              let startval = parseInt($(this).attr("data-svalue"));
              animateValue($(this), startval, endval, 5000);
            });
          }
        }
      })
      observer.observe(animcount);
    }
        

    document.body.classList.add("loaded-doc");


     $(".show-dashboard-info").click(function(){
       let tgs = $(this).attr("href");
       let correction = -164;
       $(".app-info-tabs").removeClass("active");
       $(tgs).addClass("active");
       $('html,body').animate({scrollTop: ($(tgs).offset().top+correction)}, 1000);
       $(this).parent().parent().addClass("hidden");
       $(".gr-entry.sdi-wrapper").not($(this).parent().parent()).removeClass("hidden");
       return false;
     });
     $(document).on("click",".app-info-tabs.active .ait-nav a", function(){
      var tgs = $(this).attr("href");
      $(".app-info-tabs.active .ait-nav a").removeClass("current-tab");
      $(".app-info-tabs.active .ait-content .aitc-entry").removeClass("current-tab");
      $(".app-info-tabs.active .ait-content .aitc-entry .tab-info-bubble").removeClass("active");
      $(this).addClass("current-tab");
      $(tgs).addClass("current-tab");
      return false;
    })
    $(".ait-content .tab-info-trigger").click(function(){
      var el = $(this).position(),
          x = el.left,
          y = el.top - 12,
          bts = $(this).attr("data-target");
          $(".app-info-tabs .ait-content .tab-info-bubble").removeClass("rightB");
          $(".app-info-tabs .ait-content .tab-info-bubble").removeClass("leftB");
      $(".app-info-tabs .ait-content .tab-info-bubble").not($(".app-info-tabs .ait-content #"+bts)).removeClass("active");
      if(x >= 590) {
        $(".app-info-tabs .ait-content #"+bts).addClass("rightB");
        $(".app-info-tabs .ait-content #"+bts).toggleClass("active");
        $(".ait-content #"+bts).css({
           'top' : y+'px',
           'left' : x-254+'px'
        });
      }
      else {
        $(".app-info-tabs .ait-content #"+bts).addClass("leftB");
        $(".app-info-tabs .ait-content #"+bts).toggleClass("active");
        $(".ait-content #"+bts).css({
          'top' : y+'px',
          'left' : x+50+'px'
        });
      }

      return false;
    });

    if(document.querySelector(".m-h .nav-trigger")){
      document.querySelector(".m-h .nav-trigger").addEventListener("click", function(e){ 
        document.body.classList.toggle("mobile-nav-active");
        e.preventDefault(); 
      });
    }
    function externalLinks() {
      for(var c = document.getElementsByTagName("a"), a = 0;a < c.length;a++) {
        var b = c[a];
        b.getAttribute("href") && b.hostname !== location.hostname && (b.target = "_blank")
      }
    }
    externalLinks();

    $(document).on("click",".award-info-trigger",function(){ 
      $("body").append('<div class="info-modal"><div class="info-modal-content"><a href="#" class="close">&times;</a></div></div>');
      $(this).parent().find(".modal-info").appendTo(".info-modal-content");
      return false;
    });
    $(document).on("click",".info-modal .close",function(){ 
      $(".info-modal").remove();      
      return false;
    });

    $(document).on("click",".accordion .title",function(){
      $(".accordion").not($(this).parent()).removeClass("active");
      $(this).parent().toggleClass("active");
      return false;
    });

    if($(".copy-block h6").length > 0) {
      $(".copy-block h6").each(function(){
        console.log($(this).parent().attr("class"));
        if(!$(this).parent().hasClass("no-wrapper")) {
          $(this).wrapInner( "<span></span>");
        }
      });
    }
    if($(".comparision-chart").length > 0) {
      var tlabels = new Array();
      if($(".main-heading").length > 0) {
        $(".main-heading .cells td").each(function(){
          tlabels.push($(this).text());
        });
      }
      $(".main-info-table").each(function(){
        $("td",this).each(function(index){
          if(!$(this).text().trim().length){
            $(this).addClass("hidden-info");
          }
          $(this).attr("data-label",tlabels[index]);
        });
      });
    }
    $(document).on("click",".show-modal",function(){
      let vid = $(this).attr("data-video");
      let vvid = $(this).attr("data-vvideo");
      if(vid) {
        $("body").append('<div class="modal active to-remove"><div class="container"><a href="#" class="close" aria-label="Close this dialog window">&times;</a><iframe src="https://www.youtube.com/embed/'+vid+'?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div></div>');
      }
      if(vvid) {
        $("body").append('<div class="modal active to-remove"><div class="container"><a href="#" class="close" aria-label="Close this dialog window">&times;</a><iframe src="https://player.vimeo.com/video/'+vvid+'?autoplay=1" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div></div>');
      }
      $(".main-doc").attr("aria-hidden","true");
      return false;
    });
    $(document).on("click",".modal .close",function(){
      if($(this).parent().parent().hasClass("to-remove")) {
        $(".modal.to-remove").remove();
      }
      else {
        $(this).parent().parent().removeClass("active");
      }
      $(".main-doc").attr("aria-hidden","false");
      return false;
    });

    if($(".hp-hero-carousel").length > 0) {

      $(".hp-hero-carousel").slick({
        slidesToShow: 1,
        arrows: true,
        dots: true,
        infinite: true,
        responsive: [
          {
            breakpoint: 1140,
            settings: {
              arrows: false
            }
          },
        ]

      });
      if($(".hp-hero-carousel .slick-current.slick-active").attr("data-arrowcol") == "white-arrows") {
        $(".hp-hero-carousel .slick-arrow").addClass("white");
      }
      $(".hp-hero-carousel .slick-arrow").addClass("visible");

      
      $('.hp-hero-carousel').on('afterChange', function(event, slick, currentSlide){
        var dataId = $(slick.$slides[currentSlide]).data('arrowcol');  
        console.log(dataId);
        if(dataId == "white-arrows") {
          $(".hp-hero-carousel .slick-arrow").addClass("white");
        }
        else {
          $(".hp-hero-carousel .slick-arrow").removeClass("white");
        }
      });
    }

    if($(".simple-testimonial-slide").length > 0) {
      $(".simple-testimonial-slide").slick({
        slidesToShow: 1,
        arrows: true,
        dots: true,
        infinite: true,
        responsive: [
          {
            breakpoint: 740,
            settings: {
              arrows: false
            }
          },
        ]
      });
    }
    if($(".video-carousel").length > 0) {
      $(".video-carousel").slick({
        slidesToShow: 6,
        arrows: true,
        dots: false,
        infinite: true,
        responsive: [
          {
            breakpoint: 840,
            settings: {
              slidesToShow: 6
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 3
            }
          }
        ]
      });
      $(document).on("click",".video-carousel .vd-entry a",function(){
        $(".video-carousel .vd-entry").not($(this).parent()).removeClass("active");
        $(this).parent().addClass("active");
        $(".fw-video-player").empty();
        if($(this).attr("data-vid") && $(this).attr("data-vid").length > 0) {
          let vid = $(this).attr("data-vid");
          $(".fw-video-player").append('<iframe src="https://www.youtube.com/embed/'+vid+'?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
        }
        else if($(this).attr("data-vvid") && $(this).attr("data-vvid").length > 0) {
          let vid = $(this).attr("data-vvid");
          $(".fw-video-player").append('<iframe src="https://player.vimeo.com/video/'+vid+'?autoplay=1" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>');
        }
        return false;
      });
    }

    if($(".silver-carousel").length > 0) {
      $(".silver-carousel .sc-content").slick({
        slidesToShow: 1,
        arrows: true,
        dots: true,
        infinite: true,
        adaptiveHeight: true,
      });
    }


    if($(".hs_submit.hs-submit").length > 0) {
      $(".hs-button.primary.large").wrap("<div class='submit-btn-wrapper'></div>");
    }


    $(document).on("click","a",function(){
      let tha = $(this).attr("href");
      if(tha.includes("-form")) {
        $(tha+".modal").addClass("active");
        return false;
      }
    });

  })($);
}
