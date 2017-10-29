//js functions
/*
  Slidemenu
*/
function SlideIn(){
			$('.slideIn').each( function(i){

				let bottom_of_object = $(this).offset().top + $(this).outerHeight();
				let bottom_of_window = $(window).scrollTop() + $(window).height();

				/* If the object is completely visible in the window, fade it it */
				if( bottom_of_window >= bottom_of_object - 100){
					$(this).css({'opacity':'1', 'transform':'translateY(0px)'});

				}

			});
}  

    
    $("#content").click(function(){
        $("body").removeClass("menu-active");
    });
    $(".menu-trigger").click(function(){
        $("body").addClass("menu-active");
    });
    /* loader */
    $(window).load(function() {
	$("#preloader").fadeOut("slow");
		if(innerWidth>768){
			setTimeout(SlideIn,800);
		}
		
    });
    //paralaxa
		$(window).bind('scroll', function(e){
						var scrolledY = $(window).scrollTop();
						$('.intro').css('transform','translateY(' + ((scrolledY*0.55)) + 'px)');

			//SLIDE IN
				if(innerWidth>768){
					SlideIn();
				}
		});


//gwiazdki
const canv = document.querySelector('#stars');

canv.width = window.innerWidth -17;
canv.height = window.innerHeight*1.1;

let canvW = canv.width;
let canvH = canv.height;

window.addEventListener('resize', function(){
    canv.width = window.innerWidth -17;
    canv.height = window.innerHeight*1.1;
    let canvW = canv.width;
    let canvH = canv.height;
    
    init();
})

const ctx = canv.getContext('2d');


function Stars(x,y,size){
  this.x = x;
  this.y = y;
  this.size = size;
  
  this.draw = function(){
    ctx.beginPath();
    ctx.fillRect(this.x,this.y,this.size,this.size);
    ctx.fillStyle='#fff';
  }
  
  this.update = function(){
    if(this.y<-this.size*2){
      this.y=canvH+this.size; 
    }
    if(this.size==2){
    this.y+=-1;
    }else if(this.size==3){
      this.y+=-0.6;
    }else{
      this.y+=-0.4;
    }
    
    this.draw();
  }
}

let starsArr = [];

function init(){
    starsArr = [];
    for(let i=0;i<90;i++){
  let sizeM = i%3;
  if(sizeM==0){
    size=2;
  }else if(sizeM==1){
    size=3;
  }else{
    size=4;
  }
  let x = Math.random()*canvW;
  let y = Math.random()*canvH; 
  
  starsArr.push(new Stars(x,y,size));
    }
}

function animate(){
  requestAnimationFrame(animate);
  ctx.clearRect(0,0,canvW,canvH);
  
  for(let i=0;i<starsArr.length;i++){
    starsArr[i].update();
  }
}
init();
animate();
