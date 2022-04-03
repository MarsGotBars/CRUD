let aant = 0;
let hid = document.querySelector('aside');
let fig = document.querySelector('.fig');
function sesam() {
    aant++
    while (aant == 3) {
        aant = 0;
        hid.style.opacity = "1";
        fig.style.cursor = "pointer";
    }
}
function doei(){
    hid.style.opacity = "0";
    fig.style.cursor = "default";
}