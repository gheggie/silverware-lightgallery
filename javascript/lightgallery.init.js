$(function(){
    
    // Define lightGallery Config:
    
    var config = $Config;
    
    // Initialise lightGallery Plugin:
    
    $('body').lightGallery(config);
    
    // Initialise lightGallery Plugin (for popup links):
    
    $('a.popup').lightGallery({
        selector: 'this'
    });
    
});
