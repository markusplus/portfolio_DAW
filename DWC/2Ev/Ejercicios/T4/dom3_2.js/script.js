const btn = document.getElementById('btn');
const btn2 = document.getElementById('btn2');
const image = document.getElementById('img');

image.style.width = '200px';
image.style.height = '200px';

btn.addEventListener('click', function() {
    
    if (image.src.includes('smiley.jpg')) {
        image.src = 'emoji2.jpg';
    } else {
        image.src = 'smiley.jpg';
    }
});

btn2.addEventListener('click', function() {
    if(image.style.width === '200px') {
        image.style.width = (parseInt(image.style.width) * 2) + 'px';
        image.style.height = (parseInt(image.style.height) * 2) + 'px';
    }
});

btn3.addEventListener('click', function() {
    if(image.style.width === '400px') {
        image.style.width = (parseInt(image.style.width) / 2) + 'px';
        image.style.height = (parseInt(image.style.height) / 2) + 'px';
    }
});



