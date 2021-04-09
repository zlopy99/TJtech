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
        var niz = ["zagreb","sarajevo","zadar","Makarska","Posusje"];
        

        $('#Search').autocomplete({

            // U source: "PHP-dio"... samo sam stavio primjer niza
            source: niz,
            minLength: 1,
        })

        // Button click Pretrazi
        $("#Pretrazi").click(function (e) { 
            e.preventDefault();
            var proizvod = $("#Search").val();
            var pom = false;
            proizvod = proizvod.toLowerCase();

            // Isto dodat taj niz od PHP-a... umijesto varijable niz
            niz.forEach((item, index, arr) =>{
                item = item.toLowerCase();
                if(item === proizvod){

                    // Dodat lokaciju gdje se nalazi taj proizvod... umijesto Laptopi.html
                    window.location.href = "#"; // Unijeti gdje je relocirati
                    pom = true;
                }
            })

            // Namijestanje stranice Nema Proizvoda
            if(pom === false){
                var doc = document.URL;
                if(doc.includes("user")){
                    window.location.href = "userNemaproizvoda.html";
                }else if(doc.includes("admin")){
                    window.location.href = "adminNemaproizvoda.html";
                }else {
                    window.location.href = "nemaproizvoda.html";
                }
            }
        });


}); // end of $(document).ready(function()