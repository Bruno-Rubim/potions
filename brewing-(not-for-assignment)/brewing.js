let canvas = document.querySelector('#refresh-canvas');
let ctx = canvas.getContext("2d");
let refreshImg = document.querySelector('#refresh-img');
ctx.imageSmoothingEnabled = false;
ctx.drawImage(refreshImg, 0, 0, 128, 128);

function handleRefreshButton(){
    
}

document.querySelector('#refresh-canvas').onclick = handleRefreshButton;