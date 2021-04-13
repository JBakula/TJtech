$(document).ready(function(){

    // Partner slider
        $('#partner-slider').owlCarousel({
            loop:true,
            margin:10,
            autoplay: true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        }) // end of #partner-slider(ako budemo ubacivali ikoga)


    // Team box height
        var h = $('.team-img-detail').height();
        var mbottom = h;
        h = h/2;
        var top = $('.team-box').height();
        top = (top/2)-h;
        var win = $(window).width();

        // Ako je win veće od 768px onda postavi text na vrh
        if ( win >= 768 ){
            $(".team-img-detail").css("top", top);
        } 
        // Inače postavi text ispod slike plus 20px jos odmaknut ispod nje
        else {
            $(".team-img-detail").css({
                "bottom": -mbottom+20,
                "left": "0",
                "width": "100%"
            });
            $(".team-box").css("margin-bottom", mbottom+30);
        }// end of Team box height


    // Pop up
        $('.test-popup-link').magnificPopup({
            type:'image',
            gallery:{
                enabled:true
            },
            /*zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }*/
        }); //end of Pop Up

    // User icon
        $(".dropdown-user button").click(function(){
            $(".dropdown-user ul").toggleClass("active");
        })
        $(".admin-dropdown-user button").click(function(){
            $(".admin-dropdown-user ul").toggleClass("active");
        })

    // Search dropdown 
    $("#form-data").click(function(e){
        e.preventDefault();
        $('#Naziv_proizvoda').keyup(function(){ 
            console.log("RADII");
            var route = $("#form-data").data("route");
            var query = $(this).val();
            if(query != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: "POST",
                    url: route,
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#countryList').fadeIn();  
                        $('#countryList').html(data);
                    }
                })
            }else{
                $('#countryList').hide();
            }
        })
    })

    $(".site-header-bg").on('click', 'li', function(){  
        $('#Naziv_proizvoda').val($(this).text());  
        $('#countryList').fadeOut();
    });

}); // end of $(document).ready(function()