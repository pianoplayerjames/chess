totalTime = seconds * 100;
startTime = +new Date();

function count() {

    usedTime = Math.floor((+new Date() - startTime) / 10);

    var tt = (seconds * 100) - usedTime;

    if (tt <= 0) {

        $('#' + div).html('');
        clearInterval(timer);

    } else {

        var hr = Math.floor(tt / (60 * 100) / 60);
        var mi = Math.floor(tt / (60 * 100) % 60);
        var ss = Math.floor((tt - mi * 60 * 100) / 100 % 60);
        var ms = (tt - Math.floor(tt / 100) * 100).toString()[0];

        if (hr == 0) {
            hr = '';
        } else if (hr < 10) {
            hr = '0' + hr + ':';
        } else {
            hr = hr;
        }

        if (mi == 0) {
            mi = '00:';
        } else if (mi < 10) {
            mi = '0' + mi + ':';
        } else {
            mi = mi + ':';
        }

        if (hr == '' && mi == '00:' && ss < 10) {
            ss = '0' + ss + '.' + ms;
        } else if (ss < 10) {
            ss = '0' + ss;
        }

        $('#' + div).html(hr + mi + ss);
    }
};



function timer(div, seconds) {
    totalTime = seconds * 100;
    startTime = +new Date();
}

setInterval('timer("clock1", 60)', 1000);