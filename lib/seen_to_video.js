(function () {
	

	var element = document.querySelectorAll(".-video-seen-in-block");

	for (var i = element.length - 1; i >= 0; i--) {
		element[i].addEventListener("click", handlerToMove)
	};


	function handlerToMove (e) {
		e.preventDefault();
		if(this.querySelector("iframe")){
			return;
		}
		var element = document.createElement("iframe");
		element.src = "http://www.youtube.com/embed/"+this.getAttribute("data-video")+"/?autoplay=1";
		element.style.cssText = "width: 300px; height: 180px; border: none";
		
		var parentOfImage = this.querySelector("img");
		var parentOfIco = this.querySelector("i");
		parentOfImage.parentNode.appendChild(element);
		parentOfImage.parentNode.removeChild(parentOfImage);
		parentOfIco.parentNode.removeChild(parentOfIco);

	}

}())