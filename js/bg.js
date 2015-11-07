img = new Array();
img.push('imagen/bg0.jpg');
img.push('imagen/bg1.jpg');
img.push('imagen/bg2.jpg');
img.push('imagen/bg3.jpg');

index = 0;
function altBg(){
	document.body.style.backgroundImage = 'url(' + img[index % img.length] + ')';
	index++;
}

window.onload = function(){
	setInterval('altBg()', 10000);
	// 1000 milisegundos equivalente a 1 segundos;
}; 