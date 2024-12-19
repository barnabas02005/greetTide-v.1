

<script>
      $("a").each(function() {
            if (this.href == window.location) {
			$(this).addClass("active");
		};
	});
			//code from Stackoverflow
			//Source link ===> https://stackoverflow.com/questions/13626237/how-to-display-loading-dialog-when-someone-clicks-a-specific-link
			//answer given by 'David Hellsing' profile link = "https://stackoverflow.com/users/210578/david-hellsing"
			//Question asked by 'sorin' profile link = "https://stackoverflow.com/users/99834/sorin"

        $('a').click(function(e) {
            e.preventDefault();
            var destination = this.href;
            setTimeout(function() {
            	window.location = destination;
        		},1000);
        		$('<iframe>').hide().appendTo('body').load(function()
        		{
            	window.location = destination;
            	var load = document.getElementById("loader");
            	$('.loader-room').html('<div class="loader"></div>'); // do your UI thing here
       		 }).attr('src', destination);
        		$(function() {

  					});
        });
        
    // var imagesrc = "../assets/img/3.jpg";
    //   // Upload image to the directory
    //   $(document).ready(function(){
    //     $('#image').change(function(){
    //       var formData = new FormData();
    //       var files = $('#image')[0].files;
    //       formData.append('image', files[0]);
    //       $.ajax({
    //         url: '../functions/upload.php',
    //         type: 'post',
    //         data: formData,
    //         contentType: false,
    //         processData: false,
    //         success: function(response){
    //           imagesrc = response;
    //         }
    //       });
    //     });
    //   });

      var imagesource = "../assets/img/card1.png";
      //upload image to the directory
      $(document).ready(function() {
        $('#image').change(function(){
            var formData = new FormData();
            var files = $('#image')[0].files;
            formData.append('image', files[0]);

            $.ajax({
                url: '../functions/upload.php',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(say){
                    imagesource = say;
                } 
            });
        });
      });

    //     // Real time preview card
    //         setInterval(function(){
    //     preview();
    //   }, 0);


      //Real time preview card
      setInterval(function() {
        preview();
      }, 0);

    //     function preview(){
    //     $("img").attr("src", imagesrc);
    //   }

      function preview() {
        
        var message = $('#message').val();
        $('#cardf-image').attr("src", imagesource);
        $('#pmessage').text(message);
      }

      $(document).ready(function(){  
      function autoSave()  
      {  
           var fullname = $('#fullname').val();
           var email = $('#email').val();
           var displayname = $('#displayname').val();
           var password = $('#password').val();
           if(fullname != '' && email != '' && displayname != '' && password != '')  
           {  
                $.ajax({  
                     url:"../functions/updateaccount.php",  
                     method:"POST",  
                     data:{fullname:fullname, email:email, displayname:displayname, password:password},  
                     dataType:"text",  
                     success:function(data)  
                     {  

                          $('#autoSave').text("Post save as draft");  
                          setInterval(function(){  
                               $('#autoSave').text('');  
                          }, 5000);  
                     }  
                });  
           }            
      }  
      setInterval(function(){   
           autoSave();   
           }, 10000);  
 });  


 function displayImg(input, displayTo) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#' + displayTo).attr('src', e.target.result);
            $(input).siblings('.custom-file-label').html(input.files[0].name)
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        $('#' + displayTo).attr('src',  "../assets/img/card2.png");
        $(input).siblings('.custom-file-label').html("Choose File")
    }
}




        const FP = document.getElementById("frontpage");
        const IP = document.getElementById("insidepage");
        const BP = document.getElementById("backpage");
        const frontPli = document.getElementById("FPli");
        const insidePli = document.getElementById("IPli");
        const backPli = document.getElementById("BPli");
        const startwriting = document.getElementById("Swrite");
        const SWwrappermodal = document.getElementById("SW-wrapper-modal");
        const a = document.getElementById("audios");
        const chd = document.getElementById("chD");
        const chdwrapper = document.getElementById("chD-wrapper");
        const closechD = document.getElementById("closechd");
  


        function frontpage() {
            FP.classList.add("active");
            IP.classList.remove("active");
            BP.classList.remove("active");
            frontPli.classList.add("active");
            insidePli.classList.remove("active");
            backPli.classList.remove("active");
        }        

        function insidepage() {
            FP.classList.remove("active");
            IP.classList.add("active");
            BP.classList.remove("active");
            frontPli.classList.remove("active");
            insidePli.classList.add("active");
            backPli.classList.remove("active");
        }        
        
        function backpage() {
             FP.classList.remove("active");
             IP.classList.remove("active");
             BP.classList.add("active");
             frontPli.classList.remove("active");
             insidePli.classList.remove("active");
             backPli.classList.add("active");
         }

         startwriting.onclick = function() {
            SWwrappermodal.classList.add("active");
         }

         chd.onclick = function() {
            chdwrapper.classList.add("active");
         }

         closechD.onclick = function() {
            chdwrapper.classList.remove("active");
         }

         window.onclick = function(e) {
            if(e.target == SWwrappermodal) {
                SWwrappermodal.classList.remove("active");
            }
         }

</script>