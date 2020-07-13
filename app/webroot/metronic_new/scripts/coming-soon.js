var CoomingSoon = function () {

    return {
        //main function to initiate the module
        init: function () {

            $.backstretch([
    		        "/metronic_new/img/bg/1.jpg",
    		        "/metronic_new/img/bg/2.jpg",
    		        "/metronic_new/img/bg/3.jpg",
    		        "/metronic_new/img/bg/4.jpg"
    		        ], {
    		          fade: 1000,
    		          duration: 10000
    		    });

            var austDay = new Date();
            austDay = new Date(austDay.getFullYear(), austDay.getMonth() +1 , 1);
            $('#defaultCountdown').countdown({until: austDay});
            $('#year').text(austDay.getFullYear());
        }

    };

}();