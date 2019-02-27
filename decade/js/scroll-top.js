$(document).ready(function(){ 
    $('#scroll-up-btn').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});