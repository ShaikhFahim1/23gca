  /**
   * @license
   * Copyright Wesam Gerges. All Rights Reserved.
   * Licensed under the Apache License, Version 2.0 (the "License");
   * you may not use this file except in compliance with the License.
   * You may obtain a copy of the License at
   *
   * http://www.apache.org/licenses/LICENSE-2.0
   *
   * Unless required by applicable law or agreed to in writing, software
   * distributed under the License is distributed on an "AS IS" BASIS,
   * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   * See the License for the specific language governing permissions and
   * limitations under the License.
   * =============================================================================
   */
  class FormSubmitter {
    constructor() {
      // Bind the onSubmit method to the current instance of FormSubmitter
      this.onSubmit = this.onSubmit.bind(this);
      // Initialize the form
      this.initializeForm();
    }
  
    initializeForm() {
      document.getElementById('nonMemberCheckinForm').addEventListener('submit', this.onSubmit);
    }
  
    onSubmit(event) {
      event.preventDefault(); // Prevent default form submission
      // Get form data
      var name = document.getElementById('name').value;
      var email = document.getElementById('email').value;
      // Validate name and email
      if (!name.trim() || !email.trim()) {
        this.slider = new slideToUnlock();
        // Show error message if name or email is empty
        swal("Please dfdfdf enter your name and email.", "", "info").then(() => {
            
            // Reset slider to its original position
            if (this.slider) {
             
                this.slider.returnToitsPosition();
            }
        });
//        return;
      }
      // Send AJAX request for non-member check-in
      var xhr = new XMLHttpRequest();
      xhr.open('POST', './process_checkin', true);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
              // Show success message
              swal("Check-in successful!", "", "success");
            
            } else {
              // Show error message
              swal(response.message, "", "info");
            }
          } else {
            // Show error message
            swal("An error occurred while processing your request.", "", "info");
          }
        }
      }.bind(this);
      xhr.send(JSON.stringify({
        name: name,
        email: email
      }));
    }

  
    // This method runs the submit function
    runSubmitFunction() {
      // Get form element
      var form = document.getElementById('nonMemberCheckinForm');
      // Simulate form submission
      form.dispatchEvent(new Event('submit'));
    }
  } 
  class slideToUnlock {
    constructor(el, options){
        this.$el = el;
        this.$drag;
        this.start = false;
        this.leftEdge;
        this.rightEdge;            
        this.mouseX ;

        this.settings = {
            // unlockText    : "Slide To Unlock",
            useData : false,
            unlockfn: function(){console.log("unlock")},
            lockfn  : function(){console.log("lock")},
            allowLocking : true,
            status: false,
            member:false,
            nonmember:false
        }

        // Establish our default settings
        this.settings =  Object.assign(this.settings, options);	
        if(this.settings.useData){
            if(!("unlockText" in this.settings) && this.$el.data("unlock-text")){
                this.settings.unlockText = this.$el.data("unlock-text");         
            }
            if(!("lockText" in this.settings && this.$el.data("lock-text"))){
                this.settings.lockText = this.$el.data("lock-text");
            }

            this.settings.status = this.$el.data("status");
        }

        if(!("lockText" in this.settings)){
            this.settings.lockText = "Slide To Unlock";
        }
        
        if(!("unlockText" in this.settings)){
            this.settings.unlockText = this.settings.lockText;            
        }

        this.init();
        return this;
    };

    init() {
        this.$el.addClass('slideToUnlock');
        this.leftEdge  = this.$el.offset().left;
        this.rightEdge = this.leftEdge + this.$el.outerWidth();
        
        this.$el.addClass("locked");
        this.$el.append("<div class='progressBar unlocked'></div>");
        this.$el.append("<div class='text'>" + this.settings.lockText + "</div>");
        this.$el.append("<div class='drag locked_handle '>  </div>");
        
        this.$text = this.$el.find('.text');
        this.$drag = this.$el.find('.drag');
        this.$progressBar = this.$el.find(".progressBar");
        

        this.$drag.on("mousedown touchstart",  this.touchStart.bind(this));    
        
        if(this.settings.status){
            this.$drag.css({left: "auto", right: 0 });               
            this.$progressBar.css({width: "100%"});
        }
    }

    touchStart(event = window.event){  
        this.start = true;
        this.leftEdge  = Math.trunc(this.$el.offset().left);
        this.rightEdge = Math.trunc(this.leftEdge + this.$el.outerWidth());
        
        $(document).on("mousemove touchmove",  this.touchMove.bind(this));
        $(document).on("mouseup touchend",     this.touchEnd.bind(this));
        this.mouseX = (event.type == 'mousedown' )? event.pageX : event.originalEvent.touches[0].pageX;
      
        event.preventDefault();
    }
   
    touchMove(event = window.event){ 
        if(!this.start) return;             
            var X = (event.type == 'mousemove' )? event.pageX : event.originalEvent.touches[0].pageX;
            var changeX = ( X - this.mouseX );
            var edge = Math.trunc(this.$drag.offset().left) + changeX;
            this.mouseX = X; 
            
            if(edge < this.leftEdge ){     
               
                if(this.settings.status)
                    this.settings.lockfn(this.$el);
                this.$text.text(this.settings.lockText);
                this.$drag.removeClass('unlocked_handle').addClass('locked_handle');
                this.start = false;
                this.settings.status = false;  
                this.touchEnd();                  
                return;
            }

           
            
            if(edge > this.rightEdge - this.$drag.outerWidth() ){                                                   
                if(!this.settings.status){
                    this.settings.unlockfn(this.$el);   
                }
                if(this.settings.member){
                    
                 
                  
                }else if(this.settings.nonmember){
                    // Instantiate FormSubmitter and call its method
                    this.formSubmitter = new FormSubmitter();
                    this.formSubmitter.runSubmitFunction();
                    
                }

                this.$text.text(this.settings.unlockText);
                this.$drag.removeClass('locked_handle').addClass('unlocked_handle');
                if(!this.settings.allowLocking){
                    this.$drag.off("mousedown touchstart");
                }
                this.settings.status = true;
                this.start = false;   
                this.touchEnd();             
                return;
            }

            this.$drag.offset({left : edge });           
            this.$progressBar.css({"width": edge - this.$el.offset().left + this.$drag.outerWidth() });

            event.stopImmediatePropagation();
    }
    returnToitsPosition(){
        console.log('hererer');
        // if(this.settings.status)
        //     this.settings.lockfn(this.$el);
        this.$text.text(this.settings.lockText);
        this.$drag.removeClass('unlocked_handle').addClass('locked_handle');
        this.start = false;
        this.settings.status = false;  
        this.touchEnd();                  
        return;
    }
    touchEnd(event = window.event){  
    
        this.start  = false;
        this.mouseX = 0;       
        if(!this.settings.status){
            this.$drag.animate({left : 0, "margin-left": 0 });
            if(this.$progressBar.width() > this.$drag.width()){
                this.$progressBar.animate({width : this.$drag.width()}, function(){
                    this.$progressBar.css({width:0 });                                     
                }.bind(this));
            }
        }

        if(this.settings.status){
            this.$drag.animate({"left": "100%", "margin-left": "-50px"});
            this.$progressBar.animate({width: "100%" });
        }

        $(document).off("mousemove touchmove");
        $(document).off("mouseup touchend");
        event.stopImmediatePropagation();
    }
};
/*
* Add it to Jquery
*/
(function ( $ ) {

    $.fn.slideToUnlock = function(options){
        $.each(this, function(i, el) {            
            new slideToUnlock($(el), options);
        });
        return this;
    }
}( jQuery ));

