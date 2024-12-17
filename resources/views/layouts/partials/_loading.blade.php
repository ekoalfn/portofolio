 <!-- iOS overlay -->
 <script src="{{asset('js/overlay/iosOverlay.js')}}"></script>
 <script src="{{asset('js/overlay/spin.min.js')}}"></script>
 <link rel="stylesheet" href="{{asset('js/overlay/iosOverlay.css')}}">
 <script src="{{asset('js/overlay/modernizr-2.0.6.min.js')}}"></script>
 
 <script type="text/javascript">
     function createOverlay(screenText) {
     var target = document.createElement("div");
     document.body.appendChild(target);
     var opts = {
         lines: 13, // The number of lines to draw
         length: 11, // The length of each line
         width: 5, // The line thickness
         radius: 17, // The radius of the inner circle
         corners: 1, // Corner roundness (0..1)
         rotate: 0, // The rotation offset
         color: '#FFF', // #rgb or #rrggbb
         speed: 1, // Rounds per second
         trail: 60, // Afterglow percentage
         shadow: false, // Whether to render a shadow
         hwaccel: false, // Whether to use hardware acceleration
         className: 'spinner', // The CSS class to assign to the spinner
         zIndex: 2e9, // The z-index (defaults to 2000000000)
         top: 'auto', // Top position relative to parent in px
         left: 'auto' // Left position relative to parent in px
     };        
     var spinner = new Spinner(opts).spin(target);
     gOverlay = iosOverlay({
         text: screenText,
         /*duration: 2e3,*/
         spinner: spinner
     });
     }
     var gOverlay;

 </script> 