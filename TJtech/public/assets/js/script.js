$(document).ready(function(){

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
        }
    // END OF TEAM BOX HEIGHT


    // Pop up
        $('.test-popup-link').magnificPopup({
            type:'image',
            gallery:{
                enabled:true
            }
        }); 
    // END OF POP UP

    // User icon
        $(".dropdown-user button").click(function(){
            $(".dropdown-user ul").toggleClass("active");
        })
        $(".admin-dropdown-user button").click(function(){
            $(".admin-dropdown-user ul").toggleClass("active");
        })
    // USER ICON END

    // Search dropdown 
        $("#form-data").click(function(e){
            e.preventDefault();
            $('#Naziv_proizvoda').keyup(function(){ 
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
        
        // Namještanje URL-ova kod Search dropdowna

        /*  /index.html
            /Onama.html
            /Laptopi.html
            /Ra%C4%8Dunala.html
            /Oprema.html
        */
       /*
            /userIndex.html
            /userOnama.html
            /userLaptopi.html
            /userRacunala.html
            /userOprema.html
       */
      /*
            /adminIndex.html
            /adminOnama.html
            /adminLaptopi.html
            /adminRa%C4%8Dunala.html
            /adminOprema.html
      */
        pom = window.location.href.split("/");
        pom.pop();
        $("#form-data button").click(function(e){
            e.preventDefault;
            ime = $("#form-data #Naziv_proizvoda").val();
            console.log(window.location.href);
            duljinaImena = ime.length;
            id = ime[duljinaImena-4] + ime[duljinaImena-3];
            id = parseInt(id);
            kategorijaKey = ime[duljinaImena-1];

            if(window.location.pathname.includes("user")){
                if(kategorijaKey == 1){
                    pom.push("userRacunala.html#"+String(id));
                    pom = pom.join("/");
                    window.location.href = pom;
                }else if(kategorijaKey == 2){
                    pom.push("userLaptopi.html#"+String(id));
                    pom = pom.join("/");
                    window.location.href = pom;
                }else if(kategorijaKey == 3){
                    pom.push("userOprema.html#"+String(id));
                    pom = pom.join("/");
                    window.location.href = pom;
                }else if(ime == ""){

                }else{
                    pom.push("userNemaproizvoda.html#"+String(id));
                    pom = pom.join("/");
                    window.location.href = pom;
                }
            }else if(window.location.pathname.includes("admin")){
                if(kategorijaKey == 1){
                    pom.push("adminRa%C4%8Dunala.html#"+String(id));
                    pom = pom.join("/");
                    window.location.href = pom;
                }else if(kategorijaKey == 2){
                    pom.push("adminLaptopi.html#"+String(id));
                    pom = pom.join("/");
                    window.location.href = pom;
                }else if(kategorijaKey == 3){
                    pom.push("adminOprema.html#"+String(id));
                    pom = pom.join("/");
                    window.location.href = pom;
                }else if(ime == ""){

                }else{
                    pom.push("adminNemaproizvoda.html#"+String(id));
                    pom = pom.join("/");
                    window.location.href = pom;
                }
            }else{
                if(kategorijaKey == 1){
                    pom.push("Ra%C4%8Dunala.html#"+String(id));
                    pom = pom.join("/");
                    window.location.href = pom;
                }else if(kategorijaKey == 2){
                    pom.push("Laptopi.html#"+String(id));
                    pom = pom.join("/");
                    window.location.href = pom;
                }else if(kategorijaKey == 3){
                    pom.push("Oprema.html#"+String(id));
                    pom = pom.join("/");
                    window.location.href = pom;
                }else if(ime == ""){

                }else{
                    pom.push("nemaproizvoda.html#"+String(id));
                    pom = pom.join("/");
                    window.location.href = pom;
                }
            }
        })
    //END OF SEARCH-BAR

    // Paying method
        $(".Kupi button").click(function(e){
            e.preventDefault;
            console.log("OK");
            var inpRadio = $("input[name='myRadioField']:checked").val();
            var inpAdresa = $("input[name='address']").val();
            if(!inpRadio){
                alert("Molimo ptvrdite način plaćanja.");
            }else if(!inpAdresa){
                alert("Molimo upišite adresu.");
            }
        })
    // PAYING METHOD END

    // Admin Proizvodi
        $(".dodajLaptop").hide();
        $(".dodajRacunalo").hide();
        $(".dodajOpremu").hide();


        $("#dLaptop").click(function(){
            $(".dodajLaptop").slideToggle('slow');
        });
        $("#dRacunalo").click(function(){
            $(".dodajRacunalo").slideToggle('slow');
        });
        $("#dOprema").click(function(){
            console.log("Halo");
            $(".dodajOpremu").slideToggle('slow');
        });
    // ADMIN PROIZVODI KRAJ


}); // end of $(document).ready(function()